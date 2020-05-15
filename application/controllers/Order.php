<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Order extends Public_Controller {

	public function index()
	{
		redirect(base_url('order/ticket'));
	}

	public function ticket()
	{
		$this->data = array(
            'captcha' 			=> $this->recaptcha->getWidget(), 
            'script_captcha' 	=> $this->recaptcha->getScriptTag(),
            'category_row'		=> $this->m_ticket->get_ticket_category_num_row()
        );
		$this->render('index');
	}

	public function ticket_process()
	{
		$ticket_id 		= $this->input->post('ticket_id');
		$name 			= $this->input->post('name');
		$phone 			= $this->input->post('phone');
		$phone_strip	= $this->input->post('phone_strip');
		$email 			= $this->input->post('email');
		$date 			= $this->input->post('date');
		$play_date 		= $this->input->post('play_date');
		$session_choice = $this->input->post('session');
		$session_full   = $this->input->post('session_full');
		$qty 			= $this->input->post('qty');
		$price 			= $this->input->post('price');
		$price_total 	= $this->input->post('price_total');
		$price_formated = $this->input->post('price_formated');
		$ticket_category= $this->input->post('ticket_category');
		$new_date 		= strtotime(str_replace('.','-',$date));
		$fixdate 		= date('Y-m-d', $new_date);
		$quota			= $this->input->post('quota');
		$id_category	= $this->input->post('id_category');

		// echo "<pre>", print_r($qty, true), "</pre>";
		// echo "<pre>", print_r($id_category, true), "</pre>";
		/***** VALIDATE CAPTCHA *****/
		$recaptcha = $this->input->post('g-recaptcha-response');
        $response = $this->recaptcha->verifyResponse($recaptcha);
        if (!isset($response['success']) || $response['success'] <> true) 
        {
        	$this->session->set_flashdata('failed', 'Failed to recognize the Captcha!');
            redirect(base_url('order/ticket'));
        }

		/************ CODE BOOKING CHECK IN DB ****************/
		$i = 1;
		do 
		{
			$bookingcode 	= $this->m_ticket->random_str(3, 'ABCDEFGHIJKLMNOPQRSTUVWXYZ').$this->m_ticket->random_str(1, '123456789').$this->m_ticket->			  random_str(2, 'ABCDEFGHIJKLMNOPQRSTUVWXYZ');
			$order_id 		= "OL".$bookingcode;// 8 Digit
			$check_db 		= $this->db->get_where('n_ticket_order', array('order_id' => $order_id))->num_rows();
			$i++;
		} while($check_db > 0);
		
		/************ Insert Table Ticket list ****************/
		$orderid = substr($order_id,0,-2);//memotong order id 2 digit di belakang
		$lastorder = substr($order_id,7);//memotong order id 7 digit di awal
		
		$select = $session_choice[0] == 1 ? 'quota_sess1' : 'quota_sess2';//cek array value minus / tidak

			foreach ($id_category as $key => $value) {
				if (!empty($value)) {

					$quota_db = $this->m_order->check_quota_session($select, $fixdate, $value);
					// $sisa_quota = $quota_db->$select - $qty[$key];
					$data_quota['sisa_quota'][] = $quota_db->$select - $qty[$key];
					$data_quota['data_value'][] =  $value;
						
				}
					
			}

		$run_update = min($data_quota['sisa_quota']) >= 0;
		if ($run_update) {
			$no = 1;
			foreach ($qty as $key => $value) 
		{

			if($value != '')
			{
				
				if ($value > 1) {
					for ($i=0; $i < $value; $i++) { 
						$barcode = $orderid.substr($this->m_ticket->random_str(12),7).$lastorder .$no;
						$data_list[] 	= array(
							'order_id'  		=> $order_id,
							'ticket_id'			=> $ticket_id[$key],
							'qty' 				=> 1,
							'price' 			=> $price[$key],
							'barcode'			=> $barcode
						);
						 $no = $no+1;
						// $this->m_order->insert_order_list($data_list);
					}
				}else{
					$barcode = $orderid.substr($this->m_ticket->random_str(12),7).$lastorder .$no;
					$data_list[] 	= array(
							'order_id'  		=> $order_id,
							'ticket_id'			=> $ticket_id[$key],
							'qty' 				=> $qty[$key],
							'price' 			=> $price[$key],
							'barcode'			=> $barcode
						);
					 $no = $no+1;
					// $this->m_order->insert_order_list($data_list);
				}
			}	
		}
		// echo "<pre>", print_r($data_list, true), "</pre>";
		// log_r($data_list);
		$this->db->insert_batch('n_ticket_order_list', $data_list);
		}else{
			echo 2;
			die();
		}

		/*********** GENERATE 12 DIGITS Barcode39 ************/
		$barcode39 = $data_list[0]['barcode'];

		/*********** INSERT TO Table Ticket Order (Master) *************/
		$data 	= array(
					'order_id'  		=> $order_id,
					'order_date'		=> date('Y-m-d H:i:s'),
					'name' 				=> $name,
					'phone' 			=> $phone,
					'email' 			=> $email,
					'play_date' 		=> $fixdate,
					'session_choice' 	=> $session_choice[0],
					'price_total' 		=> $price_total,
					'barcode' 			=> $barcode39
				);
		$insert = $this->m_order->insert_order($data);
		if ($insert) {
			
			$select = $session_choice[0] == 1 ? 'quota_sess1' : 'quota_sess2';

				foreach ($id_category as $key => $value) {
					if (!empty($value)) {
						
						$quota_db = $this->m_order->check_quota_session($select, $fixdate, $value);
						// $sisa_quota = $quota_db->$select - $qty[$key];
						$data_quota['sisa_quota'][] = $quota_db->$select - $qty[$key];
						$data_quota['data_value'][] =  $value;
						
					}
					
				}
		}

		$run_update = min($data_quota['sisa_quota']) >= 0;
		if ($run_update) {
			$select = $session_choice[0] == 1 ? 'quota_sess1' : 'quota_sess2';
			foreach ($data_quota['data_value'] as $key => $value) {

				$this->db->update('n_quota', array($select =>$data_quota['sisa_quota'][$key]) ,array('ticket_date' => $fixdate, 'id_category_ticket' => $value));
			}
		}else{
			echo 2;
			die();
		}

		/*********** GENERATE Barcode39 GIF ************/
		$bc 			= new Barcode39($barcode39); 
		$tempDir 		= $_SERVER['DOCUMENT_ROOT'].'/ninos/assets/img/barcode39/';
		$fileName 		= $barcode39.'.gif';
		$gifBarcode39 	= $tempDir.$fileName;
		$bc->draw($gifBarcode39);


		/*********** SEND EMAIL ***********************/
		$data['session_full'] 	= $session_full;
		$data['play_date'] 		= $play_date;
		$data['phone_strip'] 	= $phone_strip;
		$data['price_formated'] = $price_formated;
		$data['ticket_id'] = $ticket_id;
		$data['ticket_category']= $ticket_category;
		$data['qty'] 			= $qty;
		$data['price'] 			= $price;
		$send_email 			= $this->send_email($email, 'TICKET ORDER', $data, 'receipt/order', $gifBarcode39);
		// echo '<pre>'; print_r($this->email->print_debugger()); die();
		echo ($send_email ? 1 : 0);
	}

	public function cat()
	{
		echo date('Y-m-d H:i:s');
	}

	public function testmail()
	{
		$data = array(
					'code'  	=> 'B83475',
					'name' 		=> 'Yogi Kortisa',
					'phone' 	=> '080989999',
					'email' 	=> 'yogi@kortisa.com',
					'date' 		=> '7 September 2019',
					'session' 	=> 'Session 1: 08:00 s/d 12:00',
					'qty'		=> 2,
					'price'		=> 'Rp 115.000'
				);
		$data = array(
					'order_id'  		=> 'B83475',
					'order_date'		=> date('Y-m-d H:i:s'),
					'ticket_id' 		=> 'B83475',
					'name' 				=> 'Yogi Kortisa',
					'phone' 			=> '080989999',
					'email' 			=> 'yogi@kortisa.com',
					'play_date' 		=> '7 September 2019',
					'session_choice' 	=> 'Session 1: 08:00 s/d 12:00',
					'qty'				=> 34,
					'price'				=> 265436,
					'price_total' 		=> 325345,
					'barcode' 			=> 76756,
					'phone_strip'       => 84957,
					'session_full'  => 834,
					'price_formated' => 8345
				);
		$this->load->view('receipt/order', $data);
	}

	public function ticket_check()
	{
		$date 		= $this->input->post('date');
		$day 		= date("N", strtotime($date));
		$tanggal 	= date("Y-m-d", strtotime($date));
		$cek_date 	= $this->m_order->check_date($tanggal);
		
		if($cek_date != null){
			$this->m_order->ticket_check($date, $day,$tanggal );
		}else{
			$num_category = $this->m_order->get_ticket_category();

			foreach ($num_category as $key => $value) {
				
				$data[] = array (
					'id_category_ticket' 	=> $value->id,
					'ticket_date'			=> $tanggal,
					'quota_sess1'			=> 500,
					'quota_sess2'			=> 500,
				);
			}
			// log_r($data);
			$create_quota = $this->db->insert_batch('n_quota', $data);
			if($create_quota){
				$this->m_order->ticket_check($date, $day,$tanggal );
			}else{
				echo 2;
				die();
			}
		}
	}

}
