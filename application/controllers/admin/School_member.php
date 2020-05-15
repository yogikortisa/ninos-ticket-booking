<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class School_member extends Admin_Controller {

	public function index()
	{
		redirect(admin_url('school_member/list_data'));
	}

	public function list_data()
	{
		$this->data['typeschool']		= $this->m_school->get_n_typeschool()->result();
		$this->data['categori']			= $this->m_school->get_categori_school()->result();
		$this->data['datalist'] 		= $this->m_school->get_list_school();
		$this->data['listactive'] 		= $this->m_school->get_list_active();
		$this->data['listnonactive'] 	= $this->m_school->get_list_nonactive();
		$this->render('admin/school_member/list');
	}

	public function save_school_member()
	{
		$schoolname 		= $this->input->post('schoolname');
		$typeschool 		= $this->input->post('typeschool');
		$categorischool 	= $this->input->post('categorischool');
		$qtyuser 			= $this->input->post('qtyuser');
		$email	 			= $this->input->post('email');
		$leader 			= $this->input->post('leader');
		$subdistrict 		= $this->input->post('subdistrict');
		$phonenumber 		= $this->input->post('phonenumber');
		$addres 			= $this->input->post('addres');


		$data = array(
			'name' 						=> $schoolname,
			'idtypeschool' 				=> $typeschool,
			'id_categori_typeschool' 	=> $categorischool,
			'sub_district' 				=> $subdistrict,
			'qty_user' 					=> $qtyuser,
			'leader' 					=> $leader,
			'no_hp' 					=> $phonenumber,
			'email' 					=> $email,
			'addres' 					=> $addres,
			'status' 					=> 1,
		);

		$this->m_school->insert_school_member($data);
		flash_message('school_member', 'list_data');
	}

	public function school_agreement($id)
	{	
		$this->data['detailschool'] 	= $this->m_school->get_detail_school($id)->row();
		$this->render('admin/school_member/school_agreement');
	}


	public function save_school_agreement()
	{
		$id_school_member	= $this->input->post('idschool');
		$nama_leader		= $this->input->post('nama_leader');
		$jabatan			= $this->input->post('jabatan');
		$nama_sekolah 		= $this->input->post('nama_sekolah');
		$alamat 			= $this->input->post('alamat');
		$harga_ticket 		= $this->input->post('harga_ticket');
		$pcs 				= $this->input->post('pcs');
		$makanan 			= $this->input->post('makanan');
		$total_bayar 		= $this->input->post('total_bayar');
		$lunas 				= $this->input->post('lunas');
		$dp 				= $this->input->post('dp');
		$periode_dari 		= $this->input->post('p_dari');
		$periode_sampai 	= $this->input->post('p_sampai');
		$persen_dp 			= $this->input->post('persen_dp');
		$dp_date 			= $this->input->post('dp_date');
		$lambat_dp 			= $this->input->post('lambat_dp');

		/************ CODE BOOKING CHECK IN DB ****************/
	    $i = 1;
	    do 
	    {
	    	$bookingcode 	= $this->m_ticket->random_str(3, 'ABCDEFGHIJKLMNOPQRSTUVWXYZ').$this->m_ticket->random_str(1, '123456789').$this->m_ticket->			  random_str(2, 'ABCDEFGHIJKLMNOPQRSTUVWXYZ');
			$order_id 		= "OL".$bookingcode;// 8 Digit
	    	$check_db     = $this->db->get_where('n_school_order', array('order_id' => $order_id))->num_rows();
	      $i++;
	    } while($check_db > 0);

	    $orderid = substr($order_id,0,-2);//memotong order id 2 digit di belakang

	    /************ GENERATE BARCODE ****************/
	    $barcode 	= $this->m_ticket->random_str(12);// generate Barcode
		$subbarcode = substr($barcode,4);//memotong barcode 4 digit di awal

		$genbarcode = $orderid."".$subbarcode;

		$data = array(
			'id_school_member'			=> $id_school_member,
			'name_leader' 				=> $nama_leader,
			'position' 					=> $jabatan,
			'name_school' 				=> $nama_sekolah,
			'address' 					=> $alamat,
			'price_ticket' 				=> $harga_ticket,
			'id_ticket' 				=> 13,
			'pcs' 						=> $pcs,
			'food' 						=> $makanan,
			'total_pay' 				=> $total_bayar,
			'cash' 						=> $lunas,
			'dp' 						=> $dp,
			'period_from' 				=> $periode_dari,
			'period_to' 				=> $periode_sampai,
			'percent_pay' 				=> $persen_dp,
			'dp_date_pay' 				=> $dp_date,
			'date_cash' 				=> $lambat_dp,
			'status' 					=> 1,
			'order_id' 					=> $order_id,
			'barcode' 					=> $genbarcode
		);

		$barcode39 = $genbarcode;
		/*********** GENERATE Barcode39 GIF ************/
		$bc 			= new Barcode39($barcode39); 
		$tempDir 		= $_SERVER['DOCUMENT_ROOT'].'/ninos/assets/img/barcode39/';
		$fileName 		= $barcode39.'.gif';
		$gifBarcode39 	= $tempDir.$fileName;
		$bc->draw($gifBarcode39);

		$this->m_school->insert_school_agreement($data);
		flash_message('school_member', 'list_data','');
	}

	public function order_ticket($id)
	{	

		$this->data['captcha'] 				= $this->recaptcha->getWidget(); 
        $this->data['script_captcha']		= $this->recaptcha->getScriptTag();
        $this->data['category_row']			= $this->m_ticket->get_ticket_category_num_row();
		$this->data['schoolorder']			= $this->m_school->get_school_order($id)->row();
		$this->render('admin/school_member/order_ticket_school');
	}

	/// Print pdf Booking Code School Group
	public function printpdf($id)
	{
		$dataini['detailpdfschool'] 	= $this->m_school->detailpdfschool($id)->row();
		$mpdf = new \Mpdf\Mpdf(array('mode' => 'utf-8', 'format' => array(190,236)));
		$data = $this->load->view('admin/school_member/print_bookingcode', $dataini, TRUE);

		$mpdf->WriteHTML($data);
		$mpdf->Output('Code-Booking.pdf', \Mpdf\Output\Destination::INLINE);
	}
	// public function test()
	// {
	// 	// $this->load->helper('school_helper');
	// 	log_r(filterdate());
	// }

	// public function disable()
	// {
	// 	$day = array(
	// 		'1' => 'mo',
	// 		'2' => 'tu',
	// 		'3' => 'we',
	// 		'4' => 'th',
	// 		'5' => 'fr',
	// 		'6' => 'sa',
	// 		'7' => 'su',
	// 	);

	// 	$type1 = filterdate(1);
	// 	$type2 = 
	// }

	public function save_ticket_process()
	{
		$id     			= $this->input->post('id');
	    $ticket_id     		= $this->input->post('ticket_id');
	    $name       		= $this->input->post('name');
	    $phone       		= $this->input->post('phone');
	    $email       		= $this->input->post('email');
	    $play_date     		= $this->input->post('play_date');
	    $session_choice 	= 1;
	    $qty       			= $this->input->post('pcs');
	    $price       		= $this->input->post('price_ticket');
	    $price_total   		= $this->input->post('total_pay');
	    $new_date     		= strtotime(str_replace('.','-',$play_date));
	    $fixdate     		= date('Y-m-d', $new_date);
	    $order_id   		= $this->input->post('order_id');
	    $barcode39   		= $this->input->post('barcode');

	    /************ CODE BOOKING CHECK IN DB ****************/
	  //   $i = 1;
	  //   do 
	  //   {
	  //   	$bookingcode 	= $this->m_ticket->random_str(3, 'ABCDEFGHIJKLMNOPQRSTUVWXYZ').$this->m_ticket->random_str(1, '123456789').$this->m_ticket->			  random_str(2, 'ABCDEFGHIJKLMNOPQRSTUVWXYZ');
			// $order_id 		= "OL".$bookingcode;// 8 Digit
	  //   	$check_db     = $this->db->get_where('n_ticket_order', array('order_id' => $order_id))->num_rows();
	  //     $i++;
	  //   } while($check_db > 0);
	    
	    /************** INSERT TO Table Order Ticket List ***************/
	    for ($i=0; $i < $qty; $i++) {

	    $orderid = substr($order_id,0,-2);//memotong order id 2 digit di belakang
	    $lastorder = substr($order_id,7);//memotong order id 7 digit di awal(untuk angka terakhir barcode sebelum no urut)

	    //membuat nilai o1 s/d Qty
	    if ($i <= 9) {
					$nol = 0;
					$nilai = $i;
					$nilainya = $nol."".$nilai;
				}else{
					$nilainya = $i;
			}

		$barcode 	= $this->m_ticket->random_str(12);// generate Barcode
		$subbarcode = substr($barcode,7);//memotong barcode 6 digit di awal
		
		$genbarcode = $orderid."".$subbarcode."".$lastorder."".$nilainya;
		
	    	$data_list[] 	= array(
							'order_id'  		=> $order_id,
							'ticket_id'			=> $ticket_id,
							'qty' 				=> 1,
							'price' 			=> $price,
							'barcode'			=> $genbarcode,
						);
	    }
	   	
	    $this->m_school->insert_order_list($data_list);

	    /*************** GENERATE 12 DIGITS Barcode39 **************/
		// $barcode39 = $data_list[0]['barcode'];

	    /*************** INSERT TO DATABASE ****************/
	    $data   = array(
	          'order_id'      		=> $order_id,
	          'order_date'    		=> date('Y-m-d H:i:s'),
	          'name'         		=> $name,
	          'phone'       		=> $phone,
	          'email'       		=> $email,
	          'play_date'     		=> $fixdate,
	          'session_choice'   	=> $session_choice,
	          'price_total'     	=> $price_total,
	          'barcode'       		=> $barcode39
	        );

	    
	    $insert = $this->m_school->insert_order($data);

		/*************** INSERT TO Table  n_school_order set 0 ***************/
		// $data   = 0;
		// $this->m_school->set_nonactive_orderschool($data, $id);

		flash_message('school_member', 'list_data','');
	  }

	public function delete_list($id)
	{
		$this->m_school->delete_list($id);
		flash_message('school_member', 'list_data','');
	}



	public function check_holiday()
	{
		$date 		= $this->input->post('tanggal');
		$check = $this->m_school->check_holiday();
		$check_tanggal = json_decode($check->holiday);
		$tanggal = array();
		foreach ($check_tanggal as $key => $value) {
			if ($value[0] == $value[1] ) {
				$tanggal[] = $value[0];
			}else{
				$period = new DatePeriod(
					new DateTime($value[0]),
					new DateInterval('P1D'),
					new DateTime($value[1] .'+ 1 day')
				);
				foreach ($period as $key => $value) {
					$tanggal[] = $value->format('d.m.Y');
				}
			}
		}
		
		if(in_array($date, $tanggal)){
			echo 1;
		}else{
			echo 0;
		}
	}

}
