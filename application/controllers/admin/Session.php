<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Session extends Admin_Controller {

	public function index()
	{
		redirect(admin_url('session/list_data'));
	}

	public function list_data()
	{
		$this->data['get_session'] = $this->m_session->get_session_join();
		$this->render('admin/session/list');
	}

	public function create()
	{
		$this->data['session_list'] = $this->m_session->get_session_type();
		$this->render('admin/session/create');
	}

	public function insert_data()
	{
		$session[0]	= array();
		$session[1] = array();
		$holiday 	= array();
		$type 	 	= $this->input->post('session');
		$start		= array_filter($this->input->post('start'));
		$end 		= array_filter($this->input->post('end'));
		$duration	= array_filter($this->input->post('duration'));
		$date_start	= array_filter($this->input->post('uk_dp_start'));
		$date_end	= array_filter($this->input->post('uk_dp_end'));
		$info		= array_filter($this->input->post('info'));

		if($this->input->post('days'))
		{
			$day 	= json_encode($this->input->post('days'));
		}
		else
		{
			$day 	= '';
		}

		foreach ($start as $key => $value) 
		{
			$session[$key] = json_encode(array($start[$key], $end[$key], $duration[$key]));
		}

		if($this->input->post('info'))
		{
			foreach ($info as $key => $value) 
			{
				$holiday[$key] = array($date_start[$key], $date_end[$key], $info[$key]);
			}
			$holiday = json_encode($holiday);
		}
		else
		{
			$holiday = '';
		}
		
		$data 		= array(
						'type' => $type,
						'session1' => $session[0],
						'session2' => $session[1],
						'day'	   => $day,
						'holiday'  => $holiday
					);
		$insert 	= $this->m_session->insert_session($data);
		flash_message($insert, 'list_data', 'create');
	}

	public function edit($id='')
	{
		$this->data['session_list'] = $this->m_session->get_session_type();
		$this->data['get_data']		= $this->m_session->get_session_where($id);
		$this->render('admin/session/edit');
	}

	public function update_data($id='')
	{
		$session[0]	= array();
		$session[1] = array();
		$holiday 	= array();
		$start		= array_filter($this->input->post('start'));
		$end 		= array_filter($this->input->post('end'));
		$duration	= array_filter($this->input->post('duration'));
		$date_start	= array_filter($this->input->post('uk_dp_start'));
		$date_end	= array_filter($this->input->post('uk_dp_end'));
		$info		= array_filter($this->input->post('info'));

		if($this->input->post('days'))
		{
			$day 	= json_encode($this->input->post('days'));
		}
		else
		{
			$day 	= '';
		}

		foreach ($start as $key => $value) 
		{
			$session[$key] = json_encode(array($start[$key], $end[$key], $duration[$key]));
		}

		if($this->input->post('info'))
		{
			foreach ($info as $key => $value) 
			{
				$holiday[$key] = array($date_start[$key], $date_end[$key], $info[$key]);
			}
			$holiday 	= json_encode($holiday);
		}
		else
		{
			$holiday 	= '';
		}

		$data 		= array(
						'session1' => $session[0],
						'session2' => $session[1],
						'day'	   => $day,
						'holiday'  => $holiday
					);
		$update 	= $this->m_session->update_session($data, $id);
		flash_message($update, 'list_data', 'create');
	}

	public function check()
	{
		$type 		= $this->m_session->get_session_type_num_row();
		$session 	= $this->m_session->get_session_num_row();
		if($session >= $type)
		{
			echo 1;
		}
		
	}

	public function ajax()
	{
		$query = $this->m_session->get_session_type();

		foreach ($query as $val) 
		{
			echo '<option value="'.$val->id.'">'.$val->name.'</option>';
		}
	}
}
