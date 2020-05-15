<?php defined('BASEPATH') OR exit('No direct script access allowed');


class M_order extends CI_Model
{

	private $table1 = 'n_ticket_order';
	private $table2 = 'n_ticket_order_list';

	function insert_order($data)
	{
		return $this->db->insert($this->table1, $data);
	}


	function insert_order_list($data)
	{
		return $this->db->insert($this->table2, $data);
	}

	function ticket_check($date, $day, $tanggal)
	{
		$this->db->select('n_session.*, n_ticket_category.name as category_name, n_ticket_category.age_range, n_ticket.price, n_ticket.id as ticket_id, n_session_type.name as session_name, n_quota.quota_sess1, n_quota.quota_sess2,n_ticket_category.id as id_category');
		$this->db->join('n_session_type', 'n_session_type.id = n_session.type');
		$this->db->join('n_ticket', 'n_ticket.session_type = n_session_type.id');
		$this->db->join('n_ticket_category', 'n_ticket.ticket_category = n_ticket_category.id');
		$this->db->join('n_quota', 'n_ticket_category.id = n_quota.id_category_ticket');
		$this->db->where('n_quota.ticket_date', $tanggal );
		$session = $this->db->get('n_session')->result();//print_r($this->db->last_query());

		$json = array();
		foreach ($session as $val) 
		{
			if($val->type == 3) //IF HOLIDAY
			{
				/********** SEARCH IN MULTIDIMENSIONAL ARRAY ************/
				if(preg_match('/"'.preg_quote($date, '/').'"/i' , $val->holiday) == 1)
				{
					array_push($json, json_encode($val));
					$hol = "Holiday";
				}
			}
			else if($val->type == 2) //IF WEEK END
			{
				if(preg_match('/"'.preg_quote($day, '/').'"/i' , $val->day) == 1)
				{
					array_push($json, json_encode($val));
					$hol = '';
				}
			}
			else if($val->type == 1) //IF WEEK DAY
			{
				if(preg_match('/"'.preg_quote($day, '/').'"/i' , $val->day) == 1)
				{
					array_push($json, json_encode($val));
					$hol = '';
				}
			}
		}
		// parsing data ke index.php
		if ($hol != null) {
			echo $json[4].' | '.$json[5].' | '.$json[6].' | '.$json[7];
		}else{
			echo $json[0].' | '.$json[1].' | '.$json[2].' | '.$json[3];
		}

		// echo $json[0].' | '.$json[1].' | '.$json[2].' | '.$json[3];
		// echo $json[0].' | '.$json[1].' | '.$json[2].' | '.$json[3].' | '.$json[4].' | '.$json[5].' | '.$json[6];
		// foreach ($json as $key => $value) {
		// 	echo $value[$key];
		// }
		
	}

	function check_quota_session($select, $fixdate, $value)
	{
		$this->db->select($select);
		$this->db->from('n_quota');
		$this->db->where('ticket_date', $fixdate);
		$this->db->where('id_category_ticket', $value);
		return $this->db->get()->row();
	}

	function check_date($cek_date)
	{
		$this->db->select('ticket_date');
		$this->db->from('n_quota');
		$this->db->where('ticket_date', $cek_date);
		return $this->db->get()->result();
	}

	function get_ticket_category()
	{
		$this->db->select('*');
		$this->db->from('n_ticket_category');
		$this->db->where_not_in('id', 5);
		return $this->db->get()->result();
	}
}