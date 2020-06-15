<?php
class Display_Client_Login_Logs extends CI_controller{
  function __construct(){
    parent::__construct();
    //constructors here
    $this->load->model('clients/clients_model');
    error_reporting(0);
  }
  function index(){
  if($this->session->userdata('session_log')){
            $data = $this->session->userdata('session_log');
        
        
       $data_logs = array(
           'title' => 'Display Users',
            'page_content' => 'Display Users',
            'page_content2' => 'Display Status',
            'data' => clients_model::data_logs_view()
                );
        $this->load->view('files/client_logs/client_logs', $data_logs);
        }else{
            redirect('login/', 'refresh');
        }
  }
    function logs_clicked_area(){
        if($this->session->userdata('session_log')){
            $data = $this->session->userdata('session_log');
        
        
       $data_logs = array(
           'title' => 'Display Users',
            'page_content' => 'Display Users',
            'page_content2' => 'Display Status',
            'data' => clients_model::data_logs_view()
                );
        $this->load->view('files/client_logs/client_logs', $data_logs);
        }else{
            redirect('login', 'refresh');
        }
        
    }
}
