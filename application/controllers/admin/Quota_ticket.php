<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Quota_ticket extends Admin_Controller {

	public function index()
	{
		redirect(admin_url('quota_ticket/list_quota'));
	}

	public function list_quota()
	{
		$this->data['list_quota']		= $this->m_quota_ticket->list_quota();
		$this->data['category_id']		= $this->m_quota_ticket->get_ticket_category();
		$this->render('admin/quota_ticket/create_quota');
	}

	public function save_quota()
	{
		$id_category 		= $this->input->post('id_category');
		$session1 			= $this->input->post('qtysession1');
		$session2 			= $this->input->post('qtysession2');
		$from 				= $this->input->post('from');
		$new_date 			= strtotime(str_replace('.','-',$from));
		$fixfrom 			= date('Y-m-d', $new_date);

		foreach ($id_category as $key => $value) {
			$data[] = array(
				'id_category_ticket' => $id_category[$key],
				'quota_sess1'		 => $session1[$key],
				'quota_sess2'		 => $session2[$key],
				'ticket_date'		 => $fixfrom,
			);
		}
		
		$this->m_quota_ticket->insert_quota_date($data);
		flash_message('quota_ticket', 'list_quota');

	}

}
