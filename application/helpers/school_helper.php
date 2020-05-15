<?php
	
	function getsession($type)
	{
		$CI = &get_instance();
		$CI->db->select('type, day, holiday');
		$CI->db->from('n_session');
		$CI->db->where_not_in('type', $type);
		return $CI->db->get()->result();
	}


	function filterdate($id=2)
	{
		$CI = &get_instance();
		$CI->db->select('n_school_order.id_ticket, n_session.type, n_session.day, n_session.holiday');
		$CI->db->join('n_ticket', 'n_school_order.id_ticket = n_ticket.id');
		$CI->db->join('n_session', 'n_ticket.session_type = n_session.type');
		$CI->db->from('n_school_order');
		$CI->db->where('n_school_order.id', $id);
		$a = $CI->db->get()->row();

		$type = $a->type;

		if($type = 1)
		{
			$t = getsession($type);
		}
		elseif($type = 2)
		{
			$t = getsession($type);
		}
		else{
			$t = getsession($type);
		}

		return $t;
	}

?>