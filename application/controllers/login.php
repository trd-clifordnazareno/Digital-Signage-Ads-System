<?php
class Login extends CI_controller{
  function __construct(){
    parent::__construct();
    //constructors here
    $this->load->model('clients/clients_model');
    error_reporting(0);
  }
    function index(){
        /*if($this->session->userdata('session_log')   == false){
            $this->load->view('files/home/home');
            /*$data_json = '[
  {
    "FileId": 1,
    "PlaylistNumber": 1,
    "MovieTitle": "Richmedia Stinger 1.mp4",
    "VideoLengthSec": 17,
    "StartDate": "2017-10-04 01:00:00",
    "EndDate": "2020-01-31 23:59:00",
    "LoopShows": 0,
    "ClientCode": "ADSRICHMEDIA000000001"
  },
  {
    "FileId": 2,
    "PlaylistNumber": 51,
    "MovieTitle": "Richmedia Stinger 1.mp4",
    "VideoLengthSec": 17,
    "StartDate": "2017-10-04 01:00:00",
    "EndDate": "2020-01-30 23:59:00",
    "LoopShows": 0,
    "ClientCode": "ADSRICHMEDIA000000001"
  },
  {
    "FileId": 4,
    "PlaylistNumber": 52,
    "MovieTitle": "Rmni Air Sickness Tips 2017.mp4",
    "VideoLengthSec": 51,
    "StartDate": "2017-10-04 01:00:00",
    "EndDate": "2020-01-31 23:59:00",
    "LoopShows": 0,
    "ClientCode": "ADSRICHMEDIA000000001"
  },
  {
    "FileId": 3,
    "PlaylistNumber": 2,
    "MovieTitle": "Rmni Air Sickness Tips 2017.mp4",
    "VideoLengthSec": 51,
    "StartDate": "2017-10-04 01:00:00",
    "EndDate": "2020-01-31 23:59:00",
    "LoopShows": 0,
    "ClientCode": "ADSRICHMEDIA000000001"
  },
  {
    "FileId": 5,
    "PlaylistNumber": 10,
    "MovieTitle": "Rmni Cancer Facts.mp4",
    "VideoLengthSec": 16,
    "StartDate": "2017-10-04 01:00:00",
    "EndDate": "2020-01-31 23:59:00",
    "LoopShows": 0,
    "ClientCode": "ADSRICHMEDIA000000001"
  },
  {
    "FileId": 6,
    "PlaylistNumber": 60,
    "MovieTitle": "Rmni Laugh Facts.mp4",
    "VideoLengthSec": 16,
    "StartDate": "2017-10-04 01:00:00",
    "EndDate": "2020-01-31 23:59:00",
    "LoopShows": 0,
    "ClientCode": "ADSRICHMEDIA000000001"
  },
  {
    "FileId": 7,
    "PlaylistNumber": 18,
    "MovieTitle": "Rmni Sleep Facts.mp4",
    "VideoLengthSec": 16,
    "StartDate": "2017-10-04 01:00:00",
    "EndDate": "2020-01-31 23:59:00",
    "LoopShows": 0,
    "ClientCode": "ADSRICHMEDIA000000001"
  },
  {
    "FileId": 8,
    "PlaylistNumber": 68,
    "MovieTitle": "Rmni Walk Facts.mp4",
    "VideoLengthSec": 16,
    "StartDate": "2017-10-04 01:00:00",
    "EndDate": "2020-01-31 23:59:00",
    "LoopShows": 0,
    "ClientCode": "ADSRICHMEDIA000000001"
  },
  {
    "FileId": 9,
    "PlaylistNumber": 38,
    "MovieTitle": "Dyk 1.mp4",
    "VideoLengthSec": 15,
    "StartDate": "2017-10-04 01:00:00",
    "EndDate": "2020-01-31 23:59:00",
    "LoopShows": 0,
    "ClientCode": "ADSRICHMEDIA000000001"
  },
  {
    "FileId": 10,
    "PlaylistNumber": 88,
    "MovieTitle": "Dyk 2.mp4",
    "VideoLengthSec": 15,
    "StartDate": "2017-10-04 01:00:00",
    "EndDate": "2020-01-31 23:59:00",
    "LoopShows": 0,
    "ClientCode": "ADSRICHMEDIA000000001"
  },
  {
    "FileId": 11,
    "PlaylistNumber": 45,
    "MovieTitle": "P 101 Bacolod.mp4",
    "VideoLengthSec": 61,
    "StartDate": "2017-12-05 01:00:00",
    "EndDate": "2020-01-30 02:00:00",
    "LoopShows": 0,
    "ClientCode": "ADSRICHMEDIA000000001"
  },
  {
    "FileId": 12,
    "PlaylistNumber": 95,
    "MovieTitle": "P 101 Iloilo.mp4",
    "VideoLengthSec": 53,
    "StartDate": "2017-12-05 01:00:00",
    "EndDate": "2020-01-30 02:00:00",
    "LoopShows": 0,
    "ClientCode": "ADSRICHMEDIA000000001"
  },
  {
    "FileId": 17,
    "PlaylistNumber": 24,
    "MovieTitle": "RmniContactUs.mp4",
    "VideoLengthSec": 30,
    "StartDate": "2019-01-28 01:00:00",
    "EndDate": "2022-01-03 02:00:00",
    "LoopShows": 0,
    "ClientCode": "ADSRICHMEDIA000000001"
  },
  {
    "FileId": 18,
    "PlaylistNumber": 74,
    "MovieTitle": "RmniContactUs.mp4",
    "VideoLengthSec": 30,
    "StartDate": "2019-01-28 01:00:00",
    "EndDate": "2022-01-03 02:00:00",
    "LoopShows": 0,
    "ClientCode": "ADSRICHMEDIA000000001"
  },
  {
    "FileId": 22,
    "PlaylistNumber": 13,
    "MovieTitle": "Virginia03282019.mp4",
    "VideoLengthSec": 31,
    "StartDate": "2019-03-19 01:00:00",
    "EndDate": "2020-03-19 02:00:00",
    "LoopShows": 0,
    "ClientCode": "ADSVIRGINIA000000005"
  },
  {
    "FileId": 23,
    "PlaylistNumber": 63,
    "MovieTitle": "Virginia03282019.mp4",
    "VideoLengthSec": 31,
    "StartDate": "2019-03-19 01:00:00",
    "EndDate": "2020-03-19 02:00:00",
    "LoopShows": 0,
    "ClientCode": "ADSVIRGINIA000000005"
  },
  {
    "FileId": 24,
    "PlaylistNumber": 5,
    "MovieTitle": "VirginiaHotdogOle.mp4",
    "VideoLengthSec": 30,
    "StartDate": "2019-03-19 01:00:00",
    "EndDate": "2020-03-20 02:00:00",
    "LoopShows": 0,
    "ClientCode": "ADSVIRGINIA000000005"
  },
  {
    "FileId": 25,
    "PlaylistNumber": 55,
    "MovieTitle": "VirginiaNachoCheesy.mp4",
    "VideoLengthSec": 30,
    "StartDate": "2019-03-19 01:00:00",
    "EndDate": "2020-03-20 02:00:00",
    "LoopShows": 0,
    "ClientCode": "ADSVIRGINIA000000005"
  },
  {
    "FileId": 26,
    "PlaylistNumber": 27,
    "MovieTitle": "VirginiaPASTASPECIALS.mp4",
    "VideoLengthSec": 30,
    "StartDate": "2019-03-19 01:00:00",
    "EndDate": "2020-03-20 02:00:00",
    "LoopShows": 0,
    "ClientCode": "ADSVIRGINIA000000005"
  },
  {
    "FileId": 27,
    "PlaylistNumber": 77,
    "MovieTitle": "VirginiaSPAGHETTIPASTA.mp4",
    "VideoLengthSec": 30,
    "StartDate": "2019-03-19 01:00:00",
    "EndDate": "2020-03-20 02:00:00",
    "LoopShows": 0,
    "ClientCode": "ADSVIRGINIA000000005"
  },
  {
    "FileId": 36,
    "PlaylistNumber": 28,
    "MovieTitle": "MX3AWARD.mp4",
    "VideoLengthSec": 30,
    "StartDate": "2019-04-13 01:00:00",
    "EndDate": "2020-04-15 02:00:00",
    "LoopShows": 0,
    "ClientCode": "ADSDMI000000003"
  },
  {
    "FileId": 37,
    "PlaylistNumber": 78,
    "MovieTitle": "MX3INFOMERCIAL.mp4",
    "VideoLengthSec": 30,
    "StartDate": "2019-04-13 01:00:00",
    "EndDate": "2020-04-15 02:00:00",
    "LoopShows": 0,
    "ClientCode": "ADSDMI000000003"
  },
  {
    "FileId": 38,
    "PlaylistNumber": 39,
    "MovieTitle": "MX3John146.mp4",
    "VideoLengthSec": 15,
    "StartDate": "2019-04-13 01:00:00",
    "EndDate": "2020-04-15 02:00:00",
    "LoopShows": 0,
    "ClientCode": "ADSDMI000000003"
  },
  {
    "FileId": 39,
    "PlaylistNumber": 89,
    "MovieTitle": "MX3John316.mp4",
    "VideoLengthSec": 15,
    "StartDate": "2019-04-13 01:00:00",
    "EndDate": "2020-04-15 02:00:00",
    "LoopShows": 0,
    "ClientCode": "ADSDMI000000003"
  },
  {
    "FileId": 40,
    "PlaylistNumber": 47,
    "MovieTitle": "MX3Mat2435.mp4",
    "VideoLengthSec": 15,
    "StartDate": "2019-04-13 01:00:00",
    "EndDate": "2020-04-15 02:00:00",
    "LoopShows": 0,
    "ClientCode": "ADSDMI000000003"
  },
  {
    "FileId": 41,
    "PlaylistNumber": 97,
    "MovieTitle": "MX3Rom623.mp4",
    "VideoLengthSec": 15,
    "StartDate": "2019-04-13 01:00:00",
    "EndDate": "2020-04-15 02:00:00",
    "LoopShows": 0,
    "ClientCode": "ADSDMI000000003"
  },
  {
    "FileId": 58,
    "PlaylistNumber": 7,
    "MovieTitle": "WhiteflowerAd1.mp4",
    "VideoLengthSec": 16,
    "StartDate": "2019-06-24 01:00:00",
    "EndDate": "2020-04-15 02:00:00",
    "LoopShows": 0,
    "ClientCode": "ADSJelma000000045"
  },
  {
    "FileId": 59,
    "PlaylistNumber": 57,
    "MovieTitle": "WhiteflowerAd1.mp4",
    "VideoLengthSec": 16,
    "StartDate": "2019-06-24 01:00:00",
    "EndDate": "2020-04-15 02:00:00",
    "LoopShows": 0,
    "ClientCode": "ADSJelma000000045"
  },
  {
    "FileId": 60,
    "PlaylistNumber": 15,
    "MovieTitle": "WhiteflowerAd2.mp4",
    "VideoLengthSec": 16,
    "StartDate": "2019-06-24 01:00:00",
    "EndDate": "2020-04-15 02:00:00",
    "LoopShows": 0,
    "ClientCode": "ADSJelma000000045"
  },
  {
    "FileId": 61,
    "PlaylistNumber": 65,
    "MovieTitle": "WhiteflowerAd2.mp4",
    "VideoLengthSec": 16,
    "StartDate": "2019-06-24 01:00:00",
    "EndDate": "2020-04-15 02:00:00",
    "LoopShows": 0,
    "ClientCode": "ADSJelma000000045"
  },
  {
    "FileId": 66,
    "PlaylistNumber": 3,
    "MovieTitle": "Wl Ice Pop.mp4",
    "VideoLengthSec": 15,
    "StartDate": "2019-08-26 01:00:00",
    "EndDate": "2020-08-30 23:59:00",
    "LoopShows": 0,
    "ClientCode": "ADSRICHMEDIA000000001"
  },
  {
    "FileId": 67,
    "PlaylistNumber": 53,
    "MovieTitle": "Wl New Sulit [2014].mp4",
    "VideoLengthSec": 15,
    "StartDate": "2019-08-26 01:00:00",
    "EndDate": "2020-08-30 23:59:00",
    "LoopShows": 0,
    "ClientCode": "ADSRICHMEDIA000000001"
  },
  {
    "FileId": 68,
    "PlaylistNumber": 6,
    "MovieTitle": "Wl Cornbits.mp4",
    "VideoLengthSec": 15,
    "StartDate": "2019-08-26 01:00:00",
    "EndDate": "2020-08-30 23:59:00",
    "LoopShows": 0,
    "ClientCode": "ADSRICHMEDIA000000001"
  },
  {
    "FileId": 69,
    "PlaylistNumber": 56,
    "MovieTitle": "Wl D Patata (all Flavors) Revision 4.mp4",
    "VideoLengthSec": 30,
    "StartDate": "2019-08-26 01:00:00",
    "EndDate": "2020-08-30 23:59:00",
    "LoopShows": 0,
    "ClientCode": "ADSRICHMEDIA000000001"
  },
  {
    "FileId": 70,
    "PlaylistNumber": 16,
    "MovieTitle": "Wl Tokyo San.mp4",
    "VideoLengthSec": 15,
    "StartDate": "2019-08-26 01:00:00",
    "EndDate": "2020-08-30 23:59:00",
    "LoopShows": 0,
    "ClientCode": "ADSRICHMEDIA000000001"
  },
  {
    "FileId": 71,
    "PlaylistNumber": 66,
    "MovieTitle": "Wl Tattoos.mp4",
    "VideoLengthSec": 15,
    "StartDate": "2019-08-26 01:00:00",
    "EndDate": "2020-08-30 23:59:00",
    "LoopShows": 0,
    "ClientCode": "ADSRICHMEDIA000000001"
  },
  {
    "FileId": 72,
    "PlaylistNumber": 19,
    "MovieTitle": "Smwmanila Ad (30s).mp4",
    "VideoLengthSec": 30,
    "StartDate": "2017-10-04 01:00:00",
    "EndDate": "2019-11-16 01:00:00",
    "LoopShows": 0,
    "ClientCode": "ADSCOPENHAGEN000000008"
  },
  {
    "FileId": 73,
    "PlaylistNumber": 69,
    "MovieTitle": "Smwmanila Ad (30s).mp4",
    "VideoLengthSec": 30,
    "StartDate": "2017-10-04 01:00:00",
    "EndDate": "2019-11-16 01:00:00",
    "LoopShows": 0,
    "ClientCode": "ADSCOPENHAGEN000000008"
  },
  {
    "FileId": 74,
    "PlaylistNumber": 25,
    "MovieTitle": "Smwmanila Ad (30s).mp4",
    "VideoLengthSec": 30,
    "StartDate": "2017-10-04 01:00:00",
    "EndDate": "2019-11-16 01:00:00",
    "LoopShows": 0,
    "ClientCode": "ADSCOPENHAGEN000000008"
  },
  {
    "FileId": 75,
    "PlaylistNumber": 75,
    "MovieTitle": "Smwmanila Ad (30s).mp4",
    "VideoLengthSec": 30,
    "StartDate": "2017-10-04 01:00:00",
    "EndDate": "2019-11-16 01:00:00",
    "LoopShows": 0,
    "ClientCode": "ADSCOPENHAGEN000000008"
  },
  {
    "FileId": 80,
    "PlaylistNumber": 14,
    "MovieTitle": "SwuNext15s.mp4",
    "VideoLengthSec": 30,
    "StartDate": "2019-11-03 01:00:00",
    "EndDate": "2020-05-31 02:00:00",
    "LoopShows": 0,
    "ClientCode": "ADSSWU000000052"
  },
  {
    "FileId": 81,
    "PlaylistNumber": 64,
    "MovieTitle": "SwuNext15s.mp4",
    "VideoLengthSec": 30,
    "StartDate": "2019-11-03 01:00:00",
    "EndDate": "2020-05-31 02:00:00",
    "LoopShows": 0,
    "ClientCode": "ADSSWU000000052"
  },
  {
    "FileId": 82,
    "PlaylistNumber": 20,
    "MovieTitle": "SwuNext15s.mp4",
    "VideoLengthSec": 30,
    "StartDate": "2019-11-03 01:00:00",
    "EndDate": "2020-05-31 02:00:00",
    "LoopShows": 0,
    "ClientCode": "ADSSWU000000052"
  },
  {
    "FileId": 83,
    "PlaylistNumber": 70,
    "MovieTitle": "SwuNext15s.mp4",
    "VideoLengthSec": 30,
    "StartDate": "2019-11-03 01:00:00",
    "EndDate": "2020-05-31 02:00:00",
    "LoopShows": 0,
    "ClientCode": "ADSSWU000000052"
  },
  {
    "FileId": 84,
    "PlaylistNumber": 34,
    "MovieTitle": "WorldVision15secs.mp4",
    "VideoLengthSec": 15,
    "StartDate": "2019-06-24 01:00:00",
    "EndDate": "2019-11-11 02:00:00",
    "LoopShows": 0,
    "ClientCode": "ADSJelma000000045"
  },
  {
    "FileId": 85,
    "PlaylistNumber": 84,
    "MovieTitle": "WorldVision15secs.mp4",
    "VideoLengthSec": 15,
    "StartDate": "2019-06-24 01:00:00",
    "EndDate": "2019-11-11 02:00:00",
    "LoopShows": 0,
    "ClientCode": "ADSJelma000000045"
  },
  {
    "FileId": 86,
    "PlaylistNumber": 48,
    "MovieTitle": "WorldVision15secs.mp4",
    "VideoLengthSec": 15,
    "StartDate": "2019-06-24 01:00:00",
    "EndDate": "2019-11-11 02:00:00",
    "LoopShows": 0,
    "ClientCode": "ADSJelma000000045"
  },
  {
    "FileId": 87,
    "PlaylistNumber": 98,
    "MovieTitle": "WorldVision15secs.mp4",
    "VideoLengthSec": 15,
    "StartDate": "2019-06-24 01:00:00",
    "EndDate": "2019-11-11 02:00:00",
    "LoopShows": 0,
    "ClientCode": "ADSJelma000000045"
  },
  {
    "FileId": 88,
    "PlaylistNumber": 22,
    "MovieTitle": "Watson30Secs.mp4",
    "VideoLengthSec": 30,
    "StartDate": "2019-11-10 01:00:00",
    "EndDate": "2019-11-17 02:00:00",
    "LoopShows": 0,
    "ClientCode": "ADSVIRGINIA000000005"
  },
  {
    "FileId": 89,
    "PlaylistNumber": 72,
    "MovieTitle": "Watson30Secs.mp4",
    "VideoLengthSec": 30,
    "StartDate": "2019-11-10 01:00:00",
    "EndDate": "2019-11-17 02:00:00",
    "LoopShows": 0,
    "ClientCode": "ADSVIRGINIA000000005"
  },
  {
    "FileId": 90,
    "PlaylistNumber": 29,
    "MovieTitle": "Watson30Secs.mp4",
    "VideoLengthSec": 30,
    "StartDate": "2019-11-10 01:00:00",
    "EndDate": "2019-11-17 02:00:00",
    "LoopShows": 0,
    "ClientCode": "ADSVIRGINIA000000005"
  },
  {
    "FileId": 91,
    "PlaylistNumber": 79,
    "MovieTitle": "Watson30Secs.mp4",
    "VideoLengthSec": 30,
    "StartDate": "2019-11-10 01:00:00",
    "EndDate": "2019-11-17 02:00:00",
    "LoopShows": 0,
    "ClientCode": "ADSVIRGINIA000000005"
  },
  {
    "FileId": 92,
    "PlaylistNumber": 35,
    "MovieTitle": "Watson30Secs.mp4",
    "VideoLengthSec": 30,
    "StartDate": "2019-11-10 01:00:00",
    "EndDate": "2019-11-17 02:00:00",
    "LoopShows": 0,
    "ClientCode": "ADSVIRGINIA000000005"
  },
  {
    "FileId": 93,
    "PlaylistNumber": 85,
    "MovieTitle": "Watson30Secs.mp4",
    "VideoLengthSec": 30,
    "StartDate": "2019-11-10 01:00:00",
    "EndDate": "2019-11-17 02:00:00",
    "LoopShows": 0,
    "ClientCode": "ADSVIRGINIA000000005"
  }
]';*/
//$json_decode = json_decode($data_json);
//print_r("<pre>json_decode($data_json)</pre>");
        //}else{
    if($this->session->userdata('session_log')){
    $data = $this->session->userdata('session_log');
    foreach($data as $key => $value){
            if($key == 'sess_user_type'){
                $usertype = $value;
            }
        }
        if($usertype == "user"){
            redirect('view_running_status/view_running_status');
        }else if($usertype == "admin"){
            redirect('display_client_login_logs/display_client_login');
        }
      //redirect('view_running_status/view_running_status');
    }else{
        $data = array(
            'title' => 'Login'
        );
      $this->load->view('files/logs/login', $data);
    }
        //}

    }
    function method(){
      if($this->uri->rsegment(3) == 'log'){
        self::_method_log_user();
      }
    }
    function _method_log_user(){
      $username = $_POST['username'];
      $password = $_POST['password'];

      $this->load->library('form_validation');

      $this->form_validation->set_rules('username', 'Username', 'trim|required');
      $this->form_validation->set_rules('password', 'Password', 'trim|required');
      //$this->form_validation->set_rules('email', 'Email', 'trim|required|valid_email');

      if($this->form_validation->run() == false){
          
              $data = array(
                  'title' => 'Login',
              'error' => 'incomplete fields'
          );
          $this->load->view('files/logs/login', $data);
          
              

      }else{
          $data = clients_model::client_users($username, $password);
          if($data){
              foreach ($data as $data){
                  $client_id = $data->client_account_id;
                  $username = $data->client_username;
                   $password = $data->client_password;
                   $corporate_name = $data->client_corporate_name;
                   $user_type = $data->user_type;
                   $client_loc_id = $data->client_id;
                   
              }
              $data = array(
                  'sess_username' => $username,
                  'sess_user_id' => $client_id,
                  'corporate_name' => $corporate_name,
                  'sess_password' => $password,
                  'sess_time' => date("Y-m-d"),
                  'sess_user_type' => $user_type,
                  'client_loc_id' => $client_loc_id
              );
              $this->session->set_userdata('session_log', $data);
              $data = array(
                  'client_username' => $username,
                  'client_corporate_name' => $corporate_name,
                  'client_id' => $client_id,
                  'login_time' => date("Y-m-d H:i:s"),
                  'is_login' => "1",
                  'logout_time' => "",
                  'user_type' => $user_type
              );
              clients_model::client_logs($data);
              if($user_type == "user"){
              		//redirect('view_running_status/view_running_status/error_page');
                  redirect('view_running_status/view_running_status');
              }else if($user_type == "admin"){
                  redirect('display_client_login_logs/display_client_login');
              }
              //redirect('view_running_status/view_running_status');
          }else{
              $data = array(
                  'title' => 'login',
                  'error' => 'incorrect username or password'
              );
              $this->load->view('files/logs/login', $data);
          }
            
       

      }


    }
    function logout(){
    $data_sess = $this->session->userdata('session_log');
        foreach($data_sess as $key => $value){
            if($key == 'sess_user_id'){
                $client_id = $value;
            }
            
        }
        $data = array(
                  'is_login' => "0",
                  'logout_time' => date("Y-m-d H:i:s")
              );
              clients_model::client_logs_out($client_id, $data);
        $this->session->unset_userdata();
        $this->session->sess_destroy();
        //$this->load->view('files/logs/login');
        unset($_SESSION['viewsess']);
        redirect('login/');
    }
}

/*class Login extends CI_controller{
  function __construct(){
    parent::__construct();
    //constructors here
    $this->load->model('users/users');
    error_reporting(0);
  }
    function index(){
    if($this->session->userdata('session_log')){
      redirect('home_page');
    }else{
        $data = array(
            'title' => 'Login'
        );
      $this->load->view('files/logs/login', $data);
    }

    }
    function method(){
      if($this->uri->rsegment(3) == 'log'){
        self::_method_log_user();
      }
    }
    function _method_log_user(){
      $username = $_POST['username'];
      $password = $_POST['password'];

      $this->load->library('form_validation');

      $this->form_validation->set_rules('username', 'Username', 'trim|required');
      $this->form_validation->set_rules('password', 'Password', 'trim|required');
      //$this->form_validation->set_rules('email', 'Email', 'trim|required|valid_email');

      if($this->form_validation->run() == false){
          
              $data = array(
                  'title' => 'Login',
              'error' => 'incomplete fields'
          );
          $this->load->view('files/logs/login', $data);
          
              

      }else{
          $data = users::login_users($username, $password);
          if($data){
              foreach ($data as $data){
                  $username = $data->username;
                   $user_Id = $data->user_id;
                   $user_code = $data->user_code;
                   $password = $data->password;
                   $firstname = $data->firstname;
                   $lastname = $data->lastname;
                   $position = $data->position;
                   $department = $data->department;
                   $usertype = $data->user_type;
              }
              $data = array(
                  'sess_username' => $username,
                  'sess_user_id' => $user_id,
                  'sess_user_code' => $user_code,
                  'sess_user_type' => $usertype,
                  'sess_password' => $password,
                  'sess_time' => date("Y-m-d"),
                  'sess_firstname' => $firstname,
                  'sess_lastname' => $lastname,
                  'sess_position' => $position,
                  'sess_department' => $department
              );
              $this->session->set_userdata('session_log', $data);
              $data = array(
                  'user_code' => $user_code,
                  'username' => $username,
                  'login_time' => date("Y-m-d"),
                  'user_type' => $usertype
              );
              users::logs($data);
              redirect('view_running_status/view_running_status');
              //redirect('home_page');
          }else{
              $data = array(
                  'title' => 'login',
                  'error' => 'incorrect username or password'
              );
              $this->load->view('files/logs/login', $data);
          }
            
       

      }


    }
    function logout(){
        $this->session->unset_userdata('session_log');
        $this->session->sess_destroy();
        $this->load->view('files/logs/login');
    }
}*/
