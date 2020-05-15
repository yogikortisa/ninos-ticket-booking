<?php defined('BASEPATH') OR exit('No direct script access allowed');


class M_quota_ticket extends CI_Model
{

	function list_quota()
	{
		$this->db->select('n_quota.*, n_ticket_category.name');
		$this->db->from('n_quota');
		$this->db->join('n_ticket_category','n_quota.id_category_ticket = n_ticket_category.id');
		$this->db->order_by('ticket_date', 'DESC');
		return $this->db->get()->result();
	}

	function get_ticket_category()
	{
		$this->db->select('*');
		$this->db->from('n_ticket_category');
		$this->db->where_not_in('id', 5);
		return $this->db->get()->result();
	}
	
	function insert_quota_date($data)
	{
		$this->db->insert_batch('n_quota', $data);
	}
}