<?php defined('BASEPATH') OR exit('No direct script access allowed');


class M_ticket extends CI_Model
{
	private $table1 = 'n_ticket';
	private $table2 = 'n_ticket_type';
	private $table3 = 'n_ticket_category';
	private $table4 = 'n_ticket_order';

	function get_ticket_join()
	{
		$this->db->select('n_ticket.id as ticket_id, n_ticket.name as ticket_name, n_ticket_category.name as ticket_category, n_ticket_type.name as ticket_type, n_session_type.name as session_name, n_ticket.session_type, n_ticket.price');
		$this->db->from('n_ticket');
		$this->db->join('n_session_type', 'n_session_type.id = n_ticket.session_type');
		$this->db->join('n_ticket_type', 'n_ticket_type.id = n_ticket.ticket_type');
		$this->db->join('n_ticket_category', 'n_ticket_category.id = n_ticket.ticket_category');
		return	$this->db->get();
	}

	function get_ticket_order_by_status($status)
	{
		$this->db->select('n_ticket_order.*, n_ticket_order_list.ticket_id, sum(n_ticket_order_list.qty) as qty, n_ticket_order_list.price, n_ticket_type.name as ticket_type');
		$this->db->order_by('n_ticket_order.id', 'DESC');
		$this->db->join('n_ticket_order_list', 'n_ticket_order.order_id = n_ticket_order_list.order_id');
		$this->db->join('n_ticket', 'n_ticket_order_list.ticket_id = n_ticket.id');
		$this->db->join('n_ticket_type', 'n_ticket.ticket_type = n_ticket_type.id');
		$this->db->group_by('n_ticket_order.order_id');

		if($status == 1) // IF ACCEPT
		{
			return $this->db->where('payment_status = 1 OR payment_status = 2')->get('n_ticket_order');
		}
		else
		{
			return $this->db->where('payment_status', $status)->get('n_ticket_order');
		}
	}

	function get_ticket_accept()
	{
		return $this->db->order_by('id', 'DESC')->where('payment_status', 1)->get($this->table4);
	}

	function get_ticket_type()
	{
		return $this->db->get($this->table2)->result();
	}

	function get_ticket_category()
	{
		return $this->db->get($this->table3)->result();
	}

	function get_ticket_category_num_row()
	{
		return $this->db->get($this->table3)->num_rows();
	}

	function get_ticket_where($id)
	{
		return $this->db->get_where($this->table1, array('id'=>$id))->row();
	}

	function get_ticket_type_where($id)
	{
		return $this->db->get_where($this->table2, array('id'=>$id))->row();
	}

	function get_ticket_category_where($id)
	{
		return $this->db->get_where($this->table3, array('id'=>$id))->row();
	}

	function get_ticket_order_where($id)
	{
		return $this->db->get_where($this->table4, array('id'=>$id))->row();
	}

	function get_ticket_order_detail($id)
	{
		$this->db->select("n_ticket_order.*, n_ticket_order_list.ticket_id, n_ticket_order_list.qty, n_ticket_order_list.price, n_ticket_category.name as category_name, n_ticket_category.age_range, DATE_FORMAT(n_ticket_order.play_date, '%e %b %Y') as p_date, session1, session2, day, holiday, type, session_type, COUNT(n_ticket_order_list.ticket_id) as total");
		$this->db->from('n_ticket_order');
		$this->db->join('n_ticket_order_list', 'n_ticket_order.order_id = n_ticket_order_list.order_id');
		$this->db->join('n_ticket', 'n_ticket.id = n_ticket_order_list.ticket_id');
		$this->db->join('n_ticket_category', 'n_ticket.ticket_category = n_ticket_category.id');
		$this->db->join('n_session', 'n_session.type = n_ticket.session_type');
		$this->db->where('n_ticket_order.id', $id);
		$this->db->group_by('n_ticket_order_list.ticket_id');
		$this->db->order_by('total', 'desc');
		// $this->db->order_by('n_ticket_order.id', 'ASC');
		$data =	$this->db->get()->result();

		// log_r($data);

		$json = array();
		foreach ($data as $key => $value) 
		{
			array_push($json, $value);
		}
		echo json_encode($json);

		// echo json_encode($data);
	}

	function get_ticket_order_list($id)
	{
		$this->db->select("n_ticket_order.*, n_ticket_order_list.ticket_id, n_ticket_order_list.qty, n_ticket_order_list.price, n_ticket_category.name as category_name, n_ticket_category.age_range, DATE_FORMAT(n_ticket_order.play_date, '%e %b %Y') as p_date, session1, session2, day, holiday, type, session_type, COUNT(n_ticket_order_list.ticket_id) as total");
		$this->db->from('n_ticket_order');
		$this->db->join('n_ticket_order_list', 'n_ticket_order.order_id = n_ticket_order_list.order_id');
		$this->db->join('n_ticket', 'n_ticket.id = n_ticket_order_list.ticket_id');
		$this->db->join('n_ticket_category', 'n_ticket.ticket_category = n_ticket_category.id');
		$this->db->join('n_session', 'n_session.type = n_ticket.session_type');
		$this->db->where('n_ticket_order.id', $id);
		$this->db->group_by('n_ticket_order_list.ticket_id');
		$this->db->order_by('total', 'desc');
		// $this->db->order_by('n_ticket_order.id', 'ASC');
		return	$this->db->get()->result();
	}

	function insert_ticket($data)
	{
		return $this->db->insert($this->table1, $data);
	}

	function insert_ticket_type($data)
	{
		return $this->db->insert($this->table2, $data);
	}

	function insert_ticket_category($data)
	{
		return $this->db->insert($this->table3, $data);
	}

	function update_ticket($data, $id)
	{
		return $this->db->where('id', $id)->update($this->table1, $data);
	}

	function update_ticket_type($data, $id)
	{
		return $this->db->where('id', $id)->update($this->table2, $data);
	}

	function update_ticket_category($data, $id)
	{
		return $this->db->where('id', $id)->update($this->table3, $data);
	}

	function update_ticket_order_reschedule($new_date, $id)
	{
		return $this->db->where('id', $id)->update('n_ticket_order', array('play_date' => $new_date, 'payment_status' => 2));
	}

	function update_ticket_order($data, $id)
	{
		$this->db->where('id', $id);
		return $this->db->update('n_ticket_order', $data);
	}

	function random_str($length, $keyspace = '0123456789ABCDEFGHIJKLMNOPQRSTUVWXYZ')
	{
	    $pieces = [];
	    $max = mb_strlen($keyspace, '8bit') - 1;
	    for ($i = 0; $i < $length; ++$i) {
	        $pieces []= $keyspace[rand(0, $max)];
	    }
	    return implode('', $pieces);
	}


	function select_orderid($id)// ambil order_id
	{
		$this->db->select('order_id');
		$this->db->from('n_ticket_order');
		$this->db->where('id', $id);
		return $this->db->get()->row();
	}

	function update_status_generate($id)// set status_generate jadi 1
	{
		return $this->db->where('id', $id)->update('n_ticket_order', array('status_generate' => 1));
	}
	

	function get_data_list_ticket($order)// ambil data db online web
	{
		$this->db->select('n_ticket_order_list.*, n_ticket_order.play_date, n_ticket_order.session_choice, n_ticket_order.order_date, n_ticket_category.id as idticketcategori');
		$this->db->from('n_ticket_order_list');
		$this->db->join('n_ticket_order','n_ticket_order.order_id = n_ticket_order_list.order_id');
		$this->db->join('n_ticket','n_ticket_order_list.ticket_id = n_ticket.id');
		$this->db->join('n_ticket_category','n_ticket.ticket_category = n_ticket_category.id');
		$this->db->where('n_ticket_order.order_id', $order);
		return $this->db->get()->result();
	}

}