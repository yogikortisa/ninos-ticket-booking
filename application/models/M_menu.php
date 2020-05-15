<?php defined('BASEPATH') OR exit('No direct script access allowed');


class M_menu extends CI_Model
{
	function get_master_menu()
	{
		return $this->db->get_where('n_menu', array('parent'=>0))->result();
	}

	function get_sub_menu()
	{
		return $this->db->where('parent > 0')->get('n_menu')->result();
	}

	function get_menu_list()
	{
		return $this->db->get('n_menu')->result();
	}

	function insert_menu($data)
	{
		return $this->db->insert('n_menu', $data);
	}

	function menu_edit($id)
	{
		return $this->db->where('id', $id)->get('n_menu');
	}

	function delete_menu($id)
	{
		$this->db->delete('n_menu', array('id' => $id));
	}
}