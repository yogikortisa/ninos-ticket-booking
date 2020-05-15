<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Auth extends MY_Controller {
	
	function __construct()
    {
        parent::__construct();
		$this->load->library('ion_auth');
	}

    public function index()
    {
        $this->load->view('welcome_message');
    }

    public function login()
    {
        if($this->input->post())
        {
            // Get Gravatar
            $this->ion_auth->set_hook('post_login_successful', 'get_gravatar_hash', $this, '_gravatar', array());

            $remember = ($this->input->post('remember') ? 1 : 0 );
            $username = $this->input->post('username');
            $password = $this->input->post('password');

            if($this->ion_auth->login($username, $password, $remember))
            {
                redirect(admin_url('dashboard'));
            }
            else
            {
                $this->session->set_flashdata('auth_message', $this->ion_auth->errors());
                redirect(base_url('auth/login'));
            }
        }
        else
        {
            $this->render('auth/login', 'public');
        }
    }

    public function logout()
    {
        $this->ion_auth->logout();
        //$this->session->set_flashdata('auth_message', $this->ion_auth->messages());
        redirect(base_url('auth/login'));
    }

    public function _gravatar()
    {
        if($this->form_validation->valid_email($_SESSION['email']))
        {
            $gravatar_url = md5(strtolower(trim($_SESSION['email'])));
            $_SESSION['gravatar'] = $gravatar_url;
        }
        return TRUE;
    }
}