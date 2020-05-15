<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Ticket_type extends Admin_Controller {

	public function index()
	{
		redirect(admin_url('ticket_type/list_data'));
	}

	public function list_data()
	{
		$this->data['get_ticket'] =	$this->m_ticket->get_ticket_type();
		$this->render('admin/ticket_type/list');
	}

	public function create()
	{
		$this->render('admin/ticket_type/create');
	}

	public function insert_data()
	{
		$name		= $this->input->post('name');
		$data 		= array('name' => $name);
		$insert 	= $this->m_ticket->insert_ticket_type($data);
		flash_message($insert, 'list_data', 'create');
	}

	public function edit($id='')
	{
		$this->data['get_data']	= $this->m_ticket->get_ticket_type_where($id);
		$this->render('admin/ticket_type/edit');
	}

	public function update_data($id='')
	{
		$name		= $this->input->post('name');
		$data 		= array('name' => $name);
		$update 	= $this->m_ticket->update_ticket_type($data, $id);
		flash_message($update, 'list_data', 'create');
	}

}
