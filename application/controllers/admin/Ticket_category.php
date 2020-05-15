<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Ticket_category extends Admin_Controller {

	public function index()
	{
		redirect(admin_url('ticket_category/list_data'));
	}

	public function list_data()
	{
		$this->data['get_ticket'] 	=	$this->m_ticket->get_ticket_category();
		$this->render('admin/ticket_category/list');
	}

	public function create()
	{
		$this->render('admin/ticket_category/create');
	}

	public function insert_data()
	{
		$name		= $this->input->post('name');
		$age_range	= $this->input->post('age_range');
		$data 		= array('name' => $name, 'age_range' => $age_range);
		$insert 	= $this->m_ticket->insert_ticket_category($data);
		flash_message($insert, 'list_data', 'create');
	}

	public function edit($id='')
	{
		$this->data['get_data']		= 	$this->m_ticket->get_ticket_category_where($id);
		$this->render('admin/ticket_category/edit');
	}

	public function update_data($id='')
	{
		$name		= $this->input->post('name');
		$age_range	= $this->input->post('age_range');
		$data 		= array('name' => $name, 'age_range' => $age_range);
		$update 	= $this->m_ticket->update_ticket_category($data, $id);
		flash_message($update, 'list_data', 'create');
	}

}
