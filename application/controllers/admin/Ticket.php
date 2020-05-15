<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Ticket extends Admin_Controller {

	public function index()
	{
		redirect(admin_url('ticket/list_data'));
	}

	public function list_data()
	{
		$this->data['get_ticket'] 	=	$this->m_ticket->get_ticket_join();
		$this->render('admin/ticket/list');
	}

	public function create()
	{
		$this->data['session_list'] 		= $this->m_session->get_session_type();
		$this->data['ticket_type_list'] 	= $this->m_ticket->get_ticket_type();
		$this->data['ticket_category_list'] = $this->m_ticket->get_ticket_category();
		$this->render('admin/ticket/create');
	}

	public function insert_data()
	{
		$name				= $this->input->post('name');
		$session 			= $this->input->post('session');
		$ticket_type 		= $this->input->post('ticket_type');
		$ticket_category 	= $this->input->post('ticket_category');
		// $price				= (int) str_replace(',', '', substr($this->input->post('price'), 0, -3));
		$price				= $this->input->post('price');

			$data 			= array(
									'name' 				=> $name,
									'ticket_type' 		=> $ticket_type,
									'ticket_category' 	=> $ticket_category,
									'session_type'		=> $session,
									'price' 			=> $price
							);
	
		$insert 			= $this->m_ticket->insert_ticket($data);
		flash_message($insert, 'list_data', 'create');
	}

	public function edit($id='')
	{
		$this->data['session_list'] 		= $this->m_session->get_session_type();
		$this->data['ticket_type_list'] 	= $this->m_ticket->get_ticket_type();
		$this->data['ticket_category_list'] = $this->m_ticket->get_ticket_category();
		$this->data['get_data']				= $this->m_ticket->get_ticket_where($id);
		$this->render('admin/ticket/edit');
	}

	public function update_data($id='')
	{
		$name				= $this->input->post('name');
		$session 			= $this->input->post('session');
		$ticket_type 		= $this->input->post('ticket_type');
		$ticket_category 	= $this->input->post('ticket_category');
		// $price				= (int) str_replace(',', '', substr($this->input->post('price'), 0, -3));
		$price				= $this->input->post('price');

				$data 		= array(
								'name' 				=> $name,
								'ticket_type' 		=> $ticket_type,
								'ticket_category' 	=> $ticket_category,
								'session_type' 		=> $session[0],
								'price' 			=> $price
							);
		$update 	= $this->m_ticket->update_ticket($data, $id);
		flash_message($update, 'list_data', 'create');
	}

}
