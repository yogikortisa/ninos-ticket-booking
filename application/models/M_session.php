<?php defined('BASEPATH') OR exit('No direct script access allowed');


class M_session extends CI_Model
{

	private $table = 'n_session';

	function get_session_join()
	{
		$this->db->select('n_session.id as id_session, name, type, session1, session2, day, holiday');
		$this->db->from('n_session');
		$this->db->join('n_session_type', 'n_session_type.id = n_session.type');
		return $this->db->get();
	}

	function get_session_type()
	{
		return $this->db->get('n_session_type')->result();
	}

	function get_session_where($id)
	{
		return $this->db->get_where('n_session', array('id'=>$id))->row();
	}

	function get_session_num_row()
	{
		return $this->db->get('n_session')->num_rows();
	}

	function get_session_type_num_row()
	{
		return $this->db->get('n_session_type')->num_rows();
	}

	function get_session_holiday()
	{
		return json_decode($this->db->select('holiday')->where('type', 3)->get('n_session')->row()->holiday);
	}

	function insert_session($data)
	{
		return $this->db->insert('n_session', $data);
	}

	function update_session($data, $id)
	{
		return $this->db->where('id', $id)->update('n_session', $data);
	}

}