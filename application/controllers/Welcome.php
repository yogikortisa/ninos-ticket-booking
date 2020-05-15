<?php defined('BASEPATH') OR exit('No direct script access allowed');

// include_once(APPPATH.'core/Admin_Controller.php');

class Welcome extends MY_Controller {

  public function index()
  {
  	// $this->data["message"]  = $this->session->flashdata('message');
		// $this->data['test'] = 31337;
    $this->render('welcome_message', 'master');
  }
}