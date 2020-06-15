<?php
class View_Running_Status extends CI_controller{
    function __construct(){
    parent::__construct();
    //constructors here
    $this->load->model('locations/locations');
    $this->load->model('playlist/playlist_model');
    error_reporting(0);
  }
    function index(){
        playlist_model::del_playlist_expire();
        session_start();
        $_SESSION['viewsess'] = "viewsession";
        if($this->session->userdata('session_log')== TRUE){
            $data = $this->session->userdata('session_log');
            if(date("Y-m-d") < "2020-09-10"){
        $data['content_playlist'] = "content_playlist";
        $data['contents'] = "contents";
            }
        $this->load->view('files/reports/view_dig_signage', $data);
        //redirect('view_running_status/view_running_status/');
        }else{
            if($this->session->userdata('session_log')== TRUE){
                $data = $this->session->userdata('session_log');
                if(date("Y-m-d") < "2020-09-10"){
                $data['content_playlist'] = "content_playlist";
                $data['contents'] = "contents";
                }
                $this->load->view('files/reports/view_dig_signage', $data);
            }else if($this->session->userdata('session_log')== FALSE){
                if($this->session->userdata('session_log')== TRUE){
                    $data = $this->session->userdata('session_log');
                    if(date("Y-m-d") < "2020-09-10"){
                    $data['content_playlist'] = "content_playlist";
                    $data['contents'] = "contents";
                    }
                    $this->load->view('files/reports/view_dig_signage', $data);
                }else{
                    $data = array(
                    'title' => 'Login'
                    );
                    $this->load->view('files/logs/login', $data);
                }
                
            }
        }
        
        
        
        
        
        ///start code here 
        ///update add if there are expired     //////////////////////////////////////////////////////////////////
        
         /*$data_select_expired = playlist_model::data_select_expired(date("Y-m-d H:i:s"));
        if($data_select_expired){
           
                $location_code = "";
                $clients_code = "";
                $filename_code = "";
                $filename = "video/video";
                $lenght = "";
                $play = "";
                $from = "";
                $expire = "";
                $data_update_playlist = array(
                    //'clients_code' => $clients_code,
                    //'filename_code' => $filename_code,
                    //'filename' => $filename,
                    'lenght' => $lenght,
                    'play' => $play,
                    'start' => $from,
                    'expire' => $expire
                );
                playlist_model::update_playlist_table_index($data_update_playlist, date("Y-m-d H:i:s"));
           
        }
        
        ///update ticker if there are expired    //////////////////////////////////////////////////////////////
        
        $data_select_expired_ticker = playlist_model::data_select_expired_ticker(date("Y-m-d H:i:s"));
        if($data_select_expired_ticker){
           
                $location_id = "";
                $crawler_message = "";
                $start_date = "";
                $end_date = "";
                $playlist_id = "";
                $data_update_playlist_ticker = array(
                    'location_id' => $location_id,
                    'crawler_message' => $crawler_message,
                    'start_date' => $start_date,
                    'end_date' => $end_date,
                    'playlist_id' => $playlist_id,
                );
                playlist_model::update_playlist_table_ticker($data_update_playlist_ticker, date("Y-m-d H:i:s"));
           
        }
        
        
        
        
        $data = array(
            'sess_username' => 'admin',
            'sess_department' => 'admin',
            'sess_position' => 'admin',
            'sess_usertype' => 'admin',
            'sess_firstname' => 'admin',
            'sess_lastname' => 'admin',
            'sess_usercode' => 'admin',
            'title' => 'Display Users',
            'page_content' => 'Display Users',
            'page_content2' => 'Display Status'
        );
        $this->load->view('files/reports/view_dig_signage', $data);*/
        
    }
    function view_status(){
    $get_all_thread = playlist_model::get_all_thread();
foreach($get_all_thread as $get_all_thread){
    $file = $get_all_thread->file;
    if($file > 0){
        $sel_data = playlist_model::sel_data($file);//"select * from image_upload where img_upload_id = $file";
        if($sel_data){
        foreach($sel_data as $sel_data){
            $path = $sel_data->file_path . $sel_data->orig_name;
            $data = array(
                'file' => $path
            );
            playlist_model::update_thread_img($data, $file);
            break;
        }
        }
    }
    
    
    
    
}
if($this->session->userdata('session_log')== TRUE){
    $datax = $this->session->userdata('session_log');
    $get_data_in_table_loc_report = playlist_model::get_data_in_table_loc_report();
    foreach($datax as $key => $value){
            if($key == 'corporate_name'){
                $corporate_name = $value;
            }   
        }
}
        $data = locations::get_loc();
        $data = array(
            'view_locations' => $data,
            'trd' => $trd = playlist_model::get_trd(),
                'client_load' => playlist_model::client_load(),
                'session_user_data' => $datax,
                'get_data_in_table_loc_report' => $get_data_in_table_loc_report
        );
        
        $this->load->view("files/ajax_tables/view_status", $data);
    }
    function get_location(){
        $data = $this->uri->rsegment(3);
        $segmt = $data;
        $datas = locations::get_per_loc($data);
        
        //////
         $data = $this->session->userdata('session_log');
        foreach($data as $key => $value){
            if($key == 'sess_username'){
                $username = $value;
            }
            if($key == 'sess_department'){
                $department = $value;
            }
            if($key == 'sess_position'){
                $position = $value;
            }
            if($key == 'sess_user_code'){
                $usercode = $value;
            }
            if($key == 'sess_firstname'){
                $firstname = $value;
            }
            if($key == 'sess_lastname'){
                $lastname = $value;
            }
            if($key == 'sess_user_type'){
                $usertype = $value;
            }
        }
        //////
        
        $data_select_expired = playlist_model::data_select_expired(date("Y-m-d H:i:s"));
        if($data_select_expired){
           
                $location_code = "";
                $clients_code = "";
                $filename_code = "";
                $filename = "video/video";
                $lenght = "";
                $play = "";
                $from = "";
                $expire = "";
                $data_update_playlist = array(
                    //'clients_code' => $clients_code,
                    //'filename_code' => $filename_code,
                    //'filename' => $filename,
                    'lenght' => $lenght,
                    'play' => $play,
                    'start' => $from,
                    'expire' => $expire
                );
                playlist_model::update_playlist_table($segmt, $data_update_playlist, date("Y-m-d H:i:s"));
           
        }
        $get_file_data = playlist_model::get_all_file();
        $data = array(
            'data' => $datas,
            'sess_username' => $username,
            'sess_position' => $position,
            'sess_department' => $department,
            'sess_firstname' => $firstname,
            'sess_lastname' => $lastname,
            'title' => 'Playlist',
            'page_content' => 'Clients',
            'page_content2' => 'Locations',
            'page_content3' => 'Playlist',
            'file_data' => $get_file_data,
            'segmt' => $segmt
        );
        
        
            $this->load->view("files/locations/view_loc", $data);
     
    }
    function update_playlist(){
        $data_segment = $this->uri->rsegment(3);
        
        $datas = playlist_model::get_loc_code($data_segment);
        if($datas){
            foreach($datas as $data){
                $playlist_id = $data->table_location_reports_id;
                $filename_code = $data->filename_code;
                $time = date('H:i:s');
                $filename = $data->filename;
                ///update procedure here
                $data = array(
                    'playlist_id' => $playlist_id,
                    'file_id' => $filename_code,
                    'date_loged' => $time,
                    'filename' => $filename
                );
                playlist_model::insert_play_list($data);
                
               /*$playlist_code = 3;
                
                $data_per_playlist = playlist_model::get_id_per_playlist($playlist_code);
                
                if($data_per_playlist){
                    foreach ($data_per_playlist as $data){
                        $sequence = $data->sequence;
                        $add = $sequence + 1;
                        
                        $upd = array(
                            'sequence' => $add
                        );
                        playlist_model::update_playlist($playlist_code, $upd);
                    }
                }*/
                
                
                
                
                ////////////////////////
            }
        }
    }
    function x(){
        echo $this->uri->rsegment(3);
    }
    function error_page(){
    $this->load->view("files/error_page");
    }
    
    
    
    
    function get_all_loc_000xa000addressrichmedianetwork(){
    $data = array(
    'get_loc' =>  playlist_model::get_all_location(),
    'client_load' => playlist_model::client_load()
    );
        
        $this->load->view("files/failure_to_air/fail_set_up", $data);
    }
    function switch_stat(){
        $loc_code = $_POST['loc_code'];
        $stats = $_POST['status'];
        $data = array(
            'is_online' => $stats
        );
        $update_stats = playlist_model::update_stats($loc_code, $data);
    }
    function get_playlist_seq(){
        $get_seq = playlist_model::get_seq();///get loc
        foreach($get_seq as $get_seq_data){
            $loc_data = $get_seq_data->location_code;
            $get_seq_per_loc = playlist_model::get_seq_per_loc($loc_data); ///first get loc
            if($get_seq_per_loc){
                foreach($get_seq_per_loc as $get_seq_per_loc_data){
                    $get_playlist_in_loc = $get_seq_per_loc_data->sequence;
                    $sel_playlist_update = playlist_model::sel_playlist_update($loc_data); ///check loc in playlist update
                    
                    if($sel_playlist_update){
                        //do nothing
                    }else{
                        $data = array(
                            'playlist_code' =>$get_playlist_in_loc,
                            'location_code' => $loc_data
                        );
                        $insert_new_playlist_loc = playlist_model::insert_new_playlist_loc($data);
                    }
                    break;
                }
            }
        }
    }
    function save_new_thread(){
        $thread_client = $_POST['thread_client'];
        $txt_thread = $_POST['txt_thread'];
        $thread_client_id = $_POST['thread_client_id'];
        $file = $_POST['file'];
        
        $this->load->library("form_validation");
        
        $this->form_validation->set_rules('thread_client', 'Thread_client', 'trim|required');
        $this->form_validation->set_rules('txt_thread', 'Txt_thread', 'trim|required');
        $this->form_validation->set_rules('file', 'File', 'trim|required');
        $this->form_validation->set_rules('thread_client_id', 'Thread_client_id', 'trim|required');
        
        if($this->form_validation->run() == false){
        $data = array(
            'error' => "Incomplete Fields",
            'id' => 1
        );
        $this->load->view("files/error/sticky_note", $data);
        self::add_new_crawler();
        }else{
            $data = array(
                            'client_name' =>$_POST['thread_client'],
                            'thread_msg' => $_POST['txt_thread'],
                            'thread_client_id' => $_POST['thread_client_id'],
                                'file' => '0'
                        );
                        playlist_model::insert_new_thread($data);
                        
                        $get_thread_max = playlist_model::get_thread_max();
        if($get_thread_max){
            foreach($get_thread_max as $get_thread_max){
                $get_max_num = $get_thread_max->img_upload_max;
                //echo $get_max_num;
            }
            $get_zero = playlist_model::get_zero();
            if($get_zero){
                $data = array(
                    'file' => $get_max_num + 1
                );
                playlist_model::update_thread($data);
            }
        }
        }
        
    }
    function txtar(){
        echo $this->uri->rsegment(3);
    }
    function get_thread(){
        $get_thread_max = playlist_model::get_thread_max();
        if($get_thread_max){
            foreach($get_thread_max as $get_thread_max){
                $get_max_num = $get_thread_max->num_img;
                
            }
            $get_zero = playlist_model::get_zero();
            if($get_zero){
                $data = array(
                    'file' => $get_max_num
                );
                playlist_model::update_thread($data);
            }
        }
    }
    function get_client_images(){
        $x = trim($_POST['data']);
        $get_image = playlist_model::get_image($x);
        if($get_image){
            $data = array(
            'image' => $get_image
        );
        $this->load->view("files/ajax_tables/image", $data);
        }
        
    }
    function get_client_image(){
        $x = trim($_POST['data']);
       echo $x;
        
    }
    function load_process(){
    $get_all_thread = playlist_model::get_all_thread();
foreach($get_all_thread as $get_all_thread){
    $file = $get_all_thread->file;
    if($file == '1'){
        $sel_data = playlist_model::sel_data($file);//"select * from image_upload where img_upload_id = $file";
        if($sel_data){
        foreach($sel_data as $sel_data){
            $path = $sel_data->file_path . $sel_data->orig_name;
            $data = array(
                'file' => $path
            );
            playlist_model::update_thread_img($data, $file);
            break;
        }
        }
    }
    
    
    
    
}
    }
    
    
    
    function view_note(){
        echo "<div class='alert alert-danger alert-dismissible' style='margin-top: 10px; margin-left:30px; width:90%;'>
                <!--<button type='button' class='close' data-dismiss='alert' aria-hidden='true'>×</button>-->
                <h4><i class='icon fa fa-ban'></i> DISCLAIMER:</h4>
                Video Material that are running in the actual locations may differ to what is being shown in the remote content. This is due to the limitations in immediately accessing the locations' internet connection, also power failure issues that will lead to rebooting of the system devices, and other factors beyond our control. However, during those downtimes, as part of our commitment of 100% service quality, we ensure to fix all the problems as soon as possible and we promise that all videos that will run in the remote content are 100% transmitted in all the screens allocated.
              </div>";
    }
    
}

