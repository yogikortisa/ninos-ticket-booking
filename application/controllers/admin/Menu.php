<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Menu extends Admin_Controller {
	
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
        redirect(admin_url('menu/list_data'));
    }

    public function list_data()
    {
        $this->data['get_menu']   =   $this->m_menu->get_menu_list();
        $this->render('admin/menu/list');
    }

    public function create()
    {
        if($this->input->post())
        {
            $title = $this->input->post('title');
            $link = $this->input->post('link');
            $icon = $this->input->post('icon');
            $parent = $this->input->post('parent');

            $data = array(
                'title'     => $title,
                'link'      => $link,
                'icon'      => $icon,
                'parent'    => $parent
            );
            // log_r($data);
            $this->m_menu->insert_menu($data);
        
            flash_message('list_data', 'create');
            
        }
        else
        {
            $this->render('admin/menu/create');
        }
    }

    public function edit($id='')
    {
        if($this->input->post())
        {
            $title = $this->input->post('title');
            $link = $this->input->post('link');
            $icon = $this->input->post('icon');
            $parent = $this->input->post('parent');
           

            $data = array(
                'title' => $title,
                'link' => $link,
                'icon' => $icon,
                'parent' => $parent,
            ); 

            log_r($data);

            $this->m_menu->update_menu($id,$data);
            flash_message('menu', 'list_data');
        }
        else
        {
            $this->data['get_menu'] = $this->m_menu->menu_edit($id)->row();
            $this->render('admin/menu/edit');
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
        $this->m_menu->delete_menu($id);
        flash_message('menu', 'list_data');
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