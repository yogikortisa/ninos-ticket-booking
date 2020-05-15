<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Ticket_order extends Admin_Controller {

	public function index()
	{
		redirect(admin_url('ticket_order/list_data'));
	}

	public function list_data()
	{
		$this->data['get_data']			= $this->m_ticket->get_ticket_order_by_status(NULL);
		$this->data['get_accept']		= $this->m_ticket->get_ticket_order_by_status(1);
		$this->data['get_reject'] 		= $this->m_ticket->get_ticket_order_by_status(0);
		$this->data['get_reschedule'] 	= $this->m_ticket->get_ticket_order_by_status(2);
		$this->data['holiday_list'] 	= $this->m_session->get_session_holiday();
		$this->data['category_row'] 	= $this->m_ticket->get_ticket_category_num_row();
		$this->render('admin/ticket_order/list');
	}

	public function reschedule()
	{
		$this->data['get_accept'] = $this->m_ticket->get_ticket_accept();
		$this->render('admin/ticket_order/reschedule');
	}

	public function detail()
	{
		$id = $this->input->post('id');
		$this->m_ticket->get_ticket_order_detail($id);
	}

	public function approval()
	{
		/********** IF FROM RESCHEDULE *************/
		if($this->input->post('select_date'))
		{
			$id 			= $this->input->post('p_id');
			$select_date 	= $this->input->post('select_date');
			$new_date 		= date('Y-m-d', strtotime($select_date));
			$update_order 	= $this->m_ticket->update_ticket_order_reschedule($new_date, $id);
			flash_message($update_order, 'list_data', 'list_data');
		}

		if ($this->input->post('generate_barcode')) {
			$id 	= $this->input->post('p_id');
			$selectorder = $this->m_ticket->select_orderid($id);//ambil order_id
			$order = $selectorder->order_id;//kirim ke fungsi insert_listticket
			$this->insert_listticket($order);//kirim ke fungsi insert_listticket
			$this->m_ticket->update_status_generate($id);// set status_generate = '1'
			flash_message('list_data', 'list_data');
		}
		
		$id 			= $this->input->post('p_id');
		$attachment 	= $_FILES['attach']['name'];
		$payment_status = $this->input->post('payment_status');
		$session_full   = $this->input->post('session_full');
		$phone_strip	= $this->input->post('phone_strip');

		/************ CHECK FILES ***************/
		$this->form_files_check($_FILES);
	    /******* END CHECK FILES **************/

		$data 	= 	array(
				        'payment_status' => $payment_status,
				        'attachment' => $attachment
					);
		$update = 	$this->m_ticket->update_ticket_order($data, $id);

		if($update)
		{
			if($payment_status == 1)
			{
				$get_order  = 	$this->m_ticket->get_ticket_order_where($id);
				$get_detail = 	$this->m_ticket->get_ticket_order_list($id);
				$tempDir 	= 	$_SERVER['DOCUMENT_ROOT'].'/ninos/assets/img/barcode39/';
				$fileName 	= 	$get_order->barcode.'.gif';
				$gifBarcode = 	$tempDir.$fileName;

				/******************** Sent to Email **********************/
				// $config = array(
				//     'protocol'  => 'smtp',
				//     'smtp_host' => 'ssl://smtp.gmail.com',
				//     'smtp_port' => 465,
				//     'smtp_user' => 'admin@ninos.co.id',
				//     'smtp_pass' => 'xxxxxxxxxxxxxxxxx',
				//     'mailtype'  => 'html',
				//     'charset'   => 'utf-8',
				//     'dsn'		=> TRUE,
				// );
				// $this->email->initialize($config);
				// $this->email->set_mailtype("html");
				// $this->email->set_newline("\r\n");
				// $this->email->to($get_order->email);
				// $this->email->attach($gifBarcode);
				// $cid 		= 	$this->email->attachment_cid($gifBarcode);
				$data 		= 	array(
									'order_id'  	=> $get_order->order_id,
									'order_date' 	=> $get_order->order_date,
									'name' 			=> $get_order->name,
									'email' 		=> $get_order->email,
									'play_date' 	=> date('d F Y', strtotime($get_order->play_date)),
									'price_total'	=> $get_order->price_total,
									'get_detail'	=> $get_detail,
									'session_full'	=> $session_full,
									'phone_strip'	=> $phone_strip,
									'path'			=> $cid
								);
				// $contents 	= 	$this->load->view('receipt/payment', $data, true);
				// $this->email->from('admin@ninos.co.id','Ninos');
				// $this->email->subject('SUCCESSFUL PAYMENT');
				// $this->email->message($contents);
				// $send_email = 	$this->email->send();
				// print_r($this->email->print_debugger());die();

				$send_email = $this->send_email($get_order->email, 'SUCCESSFUL PAYMENT', $data, 'receipt/payment', $gifBarcode);
				/***********************************************/
			}
			$this->session->set_flashdata('success', $this->lang->line('success'));
		}
		else
		{
			$this->session->set_flashdata('failed', $this->lang->line('failed'));
		}

		redirect(admin_url('ticket_order/list_data'));
	}

	public function insert_listticket($order)
	{
		
	
		$coba = $this->m_ticket->get_data_list_ticket($order);
		
		foreach ($coba as $key => $value) {

			$data[] 	= 	array(
						'ID_TICK'  		=> $value->order_id,
						'TICK_NO' 		=> $value->barcode,
						'TICK_DATE' 	=> $value->play_date,
						'TICK_SHIFT' 	=> $value->session_choice,
						'TICK_TYPE' 	=> $value->idticketcategori,
						'TRANS_TIME'	=> $value->order_date,
						'TRANS_CODE'	=> $value->barcode,
						'TICK_STS'		=> "a",
						'ORIG_PRICE'	=> $value->price,
					);
			
		}
		
		$this->dbninos->insert_batch('tick_list',$data);
	}

}
