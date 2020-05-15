<?php

class MY_Controller extends CI_Controller
{
    protected $data        = array();

    protected $mail_config = array(
                            'protocol'  => 'smtp',
                            'smtp_host' => 'ssl://smtp.gmail.com',
                            'smtp_port' => 465,
                            'smtp_user' => 'admin@ninos.co.id',
                            'smtp_pass' => '/4Hw;w}jcx4D8~123',
                            'mailtype'  => 'html',
                            'charset'   => 'utf-8',
                            'dsn'   => TRUE,
                        );
    protected $mail_from   = 'admin@ninos.co.id';
    protected $mail_user   = 'Ninos';
    protected $mail_bcc    = 'ninostiket@gmail.com';

    function __construct()
    {
      parent::__construct();
      $this->load->library('email');
      $this->load->model('m_ticket');
      $this->load->model('m_school');
      $this->load->model('m_menu');
      $this->load->model('m_quota_ticket');
      $this->load->library('Barcode39');
      $this->dbninos = $this->load->database('ninos', TRUE);
      $this->data['pagetitle'] = SITE_NAME .": ". ucfirst($this->uri->segment(1)) ." - ". ucfirst($this->uri->segment(2));
    }

    protected function render($the_view = NULL, $themes = 'master')
    {
      if($themes == 'json' || $this->input->is_ajax_request())
      {
        header('Content-Type: application/json');
        echo json_encode($this->data);
      }
      elseif(is_null($themes))
      {
        $this->load->view($the_view,$this->data);
      }
      else
      {
        $this->data['the_view_content'] = (is_null($the_view)) ? '' : $this->load->view($the_view,$this->data, TRUE);
        $this->load->view('themes/'.$themes.'_view', $this->data);
      }
    }

    protected function send_email($to, $subject, $content, $content_view, $attachment)
    {
      /*********** SEND EMAIL ***************/
      $this->email->initialize($this->mail_config);
      $this->email->set_mailtype("html");
      $this->email->set_newline("\r\n");
      $this->email->from($this->mail_from,$this->mail_user);
      $this->email->to($to);
      $this->email->bcc(array($this->mail_bcc));
      $this->email->subject($subject);
      $this->email->attach($attachment);
      $cid              = $this->email->attachment_cid($attachment);
      $content['path']  = $cid;
      $message          = $this->load->view($content_view, $content, true);
      $this->email->message($message);
      return $this->email->send();
    }

    protected function form_files_check($files)
    {
      if($files['attach']['name'] != NULL)
      {
          $errors   = array();
          $file_name  = $files['attach']['name'];
          $file_size  = $files['attach']['size'];
          $file_tmp   = $files['attach']['tmp_name'];
          $file_type  = $files['attach']['type'];
          $temp     = explode('.',$files['attach']['name']);
          $file_ext = strtolower(end($temp));
        
          $extensions= array("jpeg","jpg","png");
        
          if(in_array($file_ext,$extensions)=== false)
          {
            $errors[]="extension not allowed, please choose a JPEG or PNG file.";
            $this->session->set_flashdata('failed', 'extension not allowed, please choose a JPEG or PNG file.');
            redirect(base_url('ticket_order/list_data'));
          }
        
          if($file_size > 2097152)
          {
            $errors[]='File size must be excately 2 MB';
            $this->session->set_flashdata('failed', 'File size must be excately 2 MB.');
            redirect(base_url('ticket_order/list_data'));
          }
        
          if(empty($errors)==true)
          {
            move_uploaded_file($file_tmp,$_SERVER['DOCUMENT_ROOT'].'/ninos/assets/img/payment/'.$file_name);
            echo "Success";
          }
          else
          {
            print_r($errors);
          }
      }
    }
}

class Admin_Controller extends MY_Controller
{
  function __construct()
  {
    parent::__construct();
    $this->load->model(['m_menu', 'm_session']);
    // $this->data['pagetitle'] = "Admin - ". ucfirst($this->uri->segment(1)) ." - ". ucfirst($this->uri->segment(2));
    $this->data['get_master_menu'] = $this->m_menu->get_master_menu();
    $this->data['get_sub_menu'] = $this->m_menu->get_sub_menu();
    $this->load->library('ion_auth');
    if($this->ion_auth->logged_in()===FALSE)
    {
        redirect(base_url('auth/login'));
    }
  }

}

class Public_Controller extends MY_Controller
{
  function __construct()
  {
    parent::__construct();
    $this->load->library('Barcode39');
    $this->load->model('m_order');
  }

  protected function render($the_view = NULL, $template = 'public')
  {
    parent::render($the_view, $template);
  }
}