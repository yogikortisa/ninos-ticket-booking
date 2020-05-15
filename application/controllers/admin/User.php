<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User extends Admin_Controller {
	
	function __construct()
    {
        parent::__construct();
        if($this->ion_auth->is_admin()===FALSE)
        {
            redirect('/');
        }
	}

    public function index()
    {
        redirect(admin_url('user/list_data'));
    }

    public function list_data()
    {
        $this->data['get_user']   =   $this->ion_auth->users();
        $this->render('admin/user/list');
    }

    public function create()
    {
        if($this->input->post())
        {
            $first_name = $this->input->post('first_name');
            $last_name = $this->input->post('last_name');
            $username = $this->input->post('username');
            $email = $this->input->post('email');
            $password = $this->input->post('password');

            $additional_data = array(
                'first_name' => $first_name,
                'last_name' => $last_name
            );
            $group = array('1'); //set to admin

            if($register = $this->ion_auth->register($username,$password,$email,$additional_data,$group))
            {
                flash_message($register, 'list_data', 'create');
            }
        }
        else
        {
            $this->render('admin/user/create');
        }
    }

    public function edit($id='')
    {
        if($this->input->post())
        {
            $first_name = $this->input->post('first_name');
            $last_name = $this->input->post('last_name');
            $username = $this->input->post('username');
            $email = $this->input->post('email');

            $data = array(
                'first_name' => $first_name,
                'last_name'  => $last_name,
                'username'   => $username,
                'email'      => $email
            );

            // update the password if it was posted
            if ($this->input->post('password')) {
                $data['password'] = $this->input->post('password');
            }

            if($update = $this->ion_auth->update($id,$data))
            {
                flash_message($update, 'list_data', 'edit');
            }
        }
        else
        {
            $this->data['get_user'] = $this->ion_auth->user($id)->row();
            $this->render('admin/user/edit');
        }
    }

    public function update_data($id='')
    {
        $name               = $this->input->post('name');
        $session            = $this->input->post('session');
        $ticket_type        = $this->input->post('ticket_type');
        $ticket_category    = $this->input->post('ticket_category');
        $price              = (int) str_replace(',', '', substr($this->input->post('price'), 0, -3));

        $data       = array(
                        'name' => $name,
                        'ticket_type' => $ticket_type,
                        'ticket_category' => $ticket_category,
                        'session_type' => $session[0],
                        'price' => $price
                    );
        $update     = $this->m_ticket->update_ticket($data, $id);
        flash_message($update, 'list_data', 'create');
    }

    public function delete($id='')
    {
        $delete = $this->ion_auth->delete_user($id);
        flash_message($delete, 'list_data', 'delete');
    }

    public function form_check()
    {
        $username = ($this->input->post('username') ? $this->input->post('username') : '');
        $email    = ($this->input->post('email') ? $this->input->post('email') : '');
        $check = ($username ? $this->ion_auth->username_check($username) : $this->ion_auth->email_check($email));

        if($check)
        {
            header("HTTP/1.0 404 Not Found");
        }
        else
        {
            header("HTTP/1.1 200 Ok");
        }
    }

}