<?php defined('BASEPATH') OR exit('No direct script access allowed');


class M_school extends CI_Model
{
	private $school_members = 'n_school_members';
	private $type_school = 'n_type_school';
	private $categori_typeschool = 'n_categori_typeschool';
	private $school_agreement = 'n_school_order';
	private $n_ticket_order = 'n_ticket_order';
	private $n_ticket_order_list = 'n_ticket_order_list';

	function get_list_school()
	{
		$this->db->select('n_school_members.id, n_school_members.name, n_type_school.name AS nametype, n_school_members.sub_district , n_school_members.qty_user, n_school_members.leader, n_school_members.no_hp, n_school_members.email, n_school_members.addres, n_categori_typeschool.name AS namecategori');
		$this->db->from($this->school_members);
		$this->db->join($this->type_school, 'n_school_members.idtypeschool = n_type_school.id');
		$this->db->join($this->categori_typeschool, 'n_school_members.id_categori_typeschool = n_categori_typeschool.id');
		$this->db->where('n_school_members.status', 1);
		return	$this->db->get();
	}

	function get_list_active()
	{
		$this->db->select('n_school_order.id ,n_school_order.name_school, n_school_order.pcs, n_school_order.name_leader, n_school_members.no_hp ,n_school_members.email');
		$this->db->from($this->school_agreement);
		$this->db->join('n_school_members', 'n_school_order.id_school_member = n_school_members.id');
		$this->db->where('n_school_order.status', 1);
		return $this->db->get();
	}

	function get_list_nonactive()
	{
		$this->db->select('n_school_order.id ,n_school_order.name_school, n_school_order.pcs, n_school_order.name_leader, n_school_members.no_hp ,n_school_members.email');
		$this->db->from($this->school_agreement);
		$this->db->join('n_school_members', 'n_school_order.id_school_member = n_school_members.id');
		$this->db->where('n_school_order.status', 0);
		return $this->db->get();
	}

	function get_n_typeschool()
	{
		$this->db->select('*');
		$this->db->from($this->type_school);
		return	$this->db->get();
	}

	function get_categori_school()
	{
		$this->db->select('*');
		$this->db->from($this->categori_typeschool);
		return	$this->db->get();
	}

	function insert_school_member($data)
	{
		return $this->db->insert($this->school_members, $data);
	}

	function insert_school_agreement($data)
	{
		return $this->db->insert($this->school_agreement, $data);
	}

	//school agreement
	function get_detail_school($id)
	{
		$this->db->select('n_school_members.id, n_school_members.name as name_sekolah, n_type_school.name AS nametype, n_school_members.sub_district , n_school_members.qty_user, n_school_members.leader, n_school_members.no_hp, n_school_members.email, n_school_members.addres, n_categori_typeschool.name AS namecategori');
		$this->db->from($this->school_members);
		$this->db->join($this->type_school, 'n_school_members.idtypeschool = n_type_school.id');
		$this->db->join($this->categori_typeschool, 'n_school_members.id_categori_typeschool = n_categori_typeschool.id');
		$this->db->where('n_school_members.id', $id);
		return	$this->db->get();
	}

	//order ticket
	function get_school_order($id)
	{
		$this->db->select('n_school_order.id, n_school_order.name_school, n_school_order.name_leader, n_school_order.pcs, n_school_order.address, n_school_order.order_id, n_school_order.barcode, n_school_members.email, n_school_members.no_hp, n_school_order.price_ticket, n_school_order.id_ticket, n_session.type, n_school_order.total_pay');
		$this->db->from($this->school_agreement);
		$this->db->join($this->school_members, 'n_school_order.id_school_member = n_school_members.id');
		$this->db->join('n_ticket', 'n_school_order.id_ticket = n_ticket.id');
		$this->db->join('n_session', 'n_ticket.session_type = n_session.type');
		$this->db->where('n_school_order.status', 1);
		return	$this->db->get();
	}

	function insert_order($data)
	{
		return $this->db->insert($this->n_ticket_order, $data);
	}

	function insert_order_list($data)
	{
		return $this->db->insert_batch($this->n_ticket_order_list, $data);
	}

	// function set_nonactive_orderschool($data, $id)
	// {
	// 	$this->db->set('status', $data);
	// 	$this->db->where('id', $id);
	// 	return $this->db->update($this->school_agreement);
	// }

	function check_holiday()
	{
		$this->db->select('holiday');
		$this->db->from('n_session');
		$this->db->where('n_session.id', 3);
		return	$this->db->get()->row();
	}

	function delete_list($id)
	{
		$this->db->delete('n_school_members', array('id' => $id));
	}

	function detailpdfschool($id)// cetak pdf booking code
	{
		$this->db->select('n_school_order.*, n_school_members.no_hp, n_school_members.email, n_session.session1, n_ticket_category.name, n_ticket_order.play_date');
		$this->db->from('n_school_order');
		$this->db->join('n_school_members', 'n_school_order.id_school_member = n_school_members.id');
		$this->db->join('n_ticket', 'n_school_order.id_ticket = n_ticket.id');
		$this->db->join('n_session', 'n_ticket.session_type = n_session.type');
		$this->db->join('n_ticket_category', 'n_ticket.ticket_category = n_ticket_category.id');
		$this->db->join('n_ticket_order', 'n_school_order.order_id = n_ticket_order.order_id','LEFT');
		$this->db->where('n_school_order.id', $id);
		return	$this->db->get();
	}
}