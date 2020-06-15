<?php

class Playlist extends CI_controller{
    function __construct(){
  parent::__construct();
  //constructors here
  $this->load->model('playlist/playlist_model');
  $this->load->model('clients/clients_model');
  error_reporting(0);
}
    function index(){
        if($this->session->userdata("session_log")){
            redirect("home/home_page");
        }  
    }
    function method(){
        if($this->uri->rsegment(3) == "edit_playlist"){
            self::_method_edit_playlist();
        }else if($this->uri->rsegment(3) == "edit_add"){
            self::_method_edit_add();
        }
    }
    function _method_edit_playlist(){
        $data = $this->uri->rsegment(4);
        
        $datas = playlist_model::get_playlist_id($data);
        
        if($datas){
            foreach($datas as $data){
                $location = $data->location_code;
                $filename = $data->filename;
                $from = $data->start;
                $expire = $data->expire;
                $sequence = $data->sequence;
                $playlist_id = $data->table_location_reports_id;
                $file_code = $data->filename_code;
                $lenght = $data->lenght;
            }
            
            
            
            $sess_data = $this->session->userdata('session_log');
    foreach($sess_data as $key => $value){
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
    
    
    
    
            $data = array(
                'location_code' => $location,
                'filename' => $filename,
                'from' => $from,
                'expire' => $expire,
                'sequence' => $sequence,
                'table_location_reports_id' => $playlist_id,
                'file_code' => $file_code,
                'lenght' => $lenght,
                'sess_username' => $username,
              'sess_department' => $department,
              'sess_position' => $position,
              'sess_usertype' => $usertype,
              'sess_firstname' => $firstname,
              'sess_lastname' => $lastname,
              'sess_usercode' => $usercode,
              'title' => 'Locations',
              'page_content' => 'Playlist',
              'page_content2' => 'Edit Playlist'
            );
            $this->load->view("files/playlist/edit_playlist", $data);
        }
    }
    function _method_edit_add(){
       $locationcode = $_POST['locationcode'];
       $filename = $_POST['filename'];
       $from = $_POST['from'];
       $expire = $_POST['expire'];
       $table_location_reports_id = $_POST['table_location_reports_id'];
       $sequence  = $_POST['sequence'];
       $seq_orig = $_POST['seq_orig'];
       $file_code = $_POST['file_code'];
       $lenght = $_POST['lenght'];
       
       
       
       $data_loc_seq = playlist_model::check_loc_seq($locationcode, $sequence);
       
       if($data_loc_seq){
           $data = array(
           'sequence' => $seq_orig
           /*'filename' => $filename,
           'from' => $from,
           'expire' => $expire,
           'location_code' => $locationcode*/
       );
           playlist_model::update_loc_seq($locationcode, $sequence, $data);
           
           $datax = playlist_model::update_playlist_sqnce($table_location_reports_id);
       
       if($datax){
           $data = array(
           'sequence' => $sequence,
           //'filename' => $filename,
           //'from' => $from,
           //'expire' => $expire,
           //'location_code' => $locationcode
       );
       playlist_model::update_add($table_location_reports_id, $data);
       }
       $data = array(
           'success' => "Youve Updated Successfully"
       );
       $this->load->view("files/error/success", $data);
       }else{
           $data = array(
               'location_code' => $locationcode,
               'filename_code' => $file_code,
               'lenght' => $lenght,
               'start' => $from,
               'expire' => $expire,
               'sequence' => $sequence,
               'filename' => $filename
           );
           playlist_model::insert_playlist($data);
           $data = array(
           'success' => "Youve Added New Playlist Successfully"
       );
       $this->load->view("files/error/success", $data);
       }
       
       
       
    }
    function add_content(){
        $datas = clients_model::get_all_clients_list();
        $get_next_playlist_number = clients_model::get_next_playlist_number($_POST['segmt']);
        if($get_next_playlist_number){
          foreach($get_next_playlist_number as $get_next_playlist_number){
            $sequence_numbr = $get_next_playlist_number->sequence_number + 1;
            break;
        }  
        }
        
        $data = array(
            'segmt' => $_POST['segmt'],
            'clients' => $datas,
            'sequence' => $sequence_numbr
        );
        
        
        $this->load->view("files/playlist/add_content", $data);
    }
    function add_new_content(){
        $clientname = $_POST['clientname'];
                                            $filename = $_POST['filename'];
                                            //$length = $_POST['length'];
                                            $startdate = $_POST['startdate'];
                                            $starttime = $_POST['starttime'];
                                            $expiredate = $_POST['expiredate'];
                                            $expiretime = $_POST['expiretime'];
                                            $playlist_number = $_POST['playlist_number'];
                                            $location_code = $_POST['location_code'];
                                            $ajax = $_POST['ajax'];
                                            
                                            
                                            $this->load->library("form_validation");
        
                                            $this->form_validation->set_rules('playlist_number', 'Filename', 'trim|required');
                                            $this->form_validation->set_rules('clientname', 'Clientname', 'trim|required');
                                            $this->form_validation->set_rules('filename', 'Filename', 'trim|required');
                                            //$this->form_validation->set_rules('length', 'Length', 'trim|required');
                                            $this->form_validation->set_rules('startdate', 'Startdate', 'trim|required');
                                            $this->form_validation->set_rules('starttime', 'Starttime', 'trim|required');
                                            $this->form_validation->set_rules('expiredate', 'Expiredate', 'trim|required');
                                            $this->form_validation->set_rules('expiretime', 'Expiretime', 'trim|required');
                                            
                                            if($this->form_validation->run() == false){
                                                $data = array(
                                                    'error' => "Incomplete Details"
                                                );
                                                $this->load->view("files/error/err_add_content", $data);
                                                $data['segmt'] = $location_code;
                                                $this->load->view("files/playlist/add_content", $data);
                                            }else{
                                                $data = array(
                                                'filename' => $filename,
                                                'playlist_number' => $playlist_number,
                                                'clients_name' => $clientname,
                                                'length' => 0,
                                                'start_date' => $startdate . " " .  $starttime,
                                                'expire_date' => $expiredate . " " . $expiretime,
                                                'location_code' => $location_code
                                            );
                                            
                                            
                                            playlist_model::add_new_client($data);
                                            
                                            
                                            
                                            $data_loc_playlist = playlist_model::data_loc_playlist($location_code, $playlist_number);
                                            
                                            if($data_loc_playlist){
                                                foreach($data_loc_playlist as $data){
                                                    $client_id = $data->clients_id;
                                                    $clients_name = $data->clients_name;
                                                    $location_code = $data->location_code;
                                                    $filename = $data->filename;
                                                    $length = $data->length;
                                                    $start_date = $data->start_date;
                                                    $expire_date = $data->expire_date;
                                                    $playlist_number = $data->playlist_number;
                                                            
                                                }
                                            }
                                            
                                            $get_file_code = playlist_model::get_file_code($filename);
                                            if($get_file_code){
                                                foreach($get_file_code as $get_file_code){
                                                    $file_id = $get_file_code->video_file_id;
                                                } 
                                            }
                                            
                                            $data_new_play_list = array(
                                                'location_code' => $location_code,
                                                'clients_code' => $clients_name,
                                                'filename_code' => $file_id,
                                                'filename' => str_replace("_"," ",$filename),
                                                'lenght' => "0",
                                                'start' => $start_date,
                                                'expire' => $expire_date,
                                                'sequence' => $playlist_number
                                            );
                                            
                                            playlist_model::insert_new_playlist($data_new_play_list);
                                            $data_play_list = array(
                                                'data' => playlist_model::get_play_list($location_code),
                                                'segmt' => $location_code,
                                                'success' => "You Successfully Added Content"
                                            );
                                            
                                            /*foreach($data_play_list as $data){
                                                $clients_name = $data->clients_name;
                                                $playlist_number = $data->playlist_number;
                                                $filename = $data->filename;
                                                $start_date = $data->filename;
                                                $expire_date = $data->expire_date;
                                                $length = $data->length;
                                            }
                                            
                                            $load_playlist = array(
                                                'clients_name' => $clients_name,
                                                'playlist_number' => $playlist_number,
                                                'filename' => $filename,
                                                'start_date' => $start_date,
                                                'expire_date' => $expire_date,
                                                'length' => $length

                                            );*/
                                         redirect("http://richmedia.com.ph/rmni/video_time/time_init.php");
                                            //echo var_dump($load_playlist);
                                            $this->load->view("files/ajax_tables/fresh_playlist_load", $data_play_list);
                                            
                                            }
                                            
                                            
    }
    function upload_video(){
        $config['upload_path'] = './js/uploads/video/';
        $config['allowed_types'] = '*';
        $config['max_filename'] = '255';
        //$config['encrypt_name'] = TRUE;
        $config['max_size'] = '100024'; //1 MB
 
        if (isset($_FILES['file']['name'])) {
            if (0 < $_FILES['file']['error']) {
                echo 'Error during file upload' . $_FILES['file']['error'];
            } else {
                if (file_exists('js/uploads/video/' . str_replace(" ", "_", $_FILES['file']['name']))) {
                    //echo 'File already exists : uploads/' . $_FILES['file']['name'];
                    echo '<div class="alert alert-danger alert-dismissable">
                                        <i class="fa fa-ban"></i>
                                        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                                       
                                            ' . 'File already exists : uploads/' . $_FILES['file']['name']    ;
                } else {
                    $this->load->library('upload', $config);
                    if (!$this->upload->do_upload('file')) {
                        echo $this->upload->display_errors();
                    } else {
                        $data = $this->upload->data();
                        
                        
                        foreach($data as $data =>$key){
                            if($data == "file_name"){
                                $file_name = $key;
                            }
                            if($data == "file_type"){
                                $file_type = $key;
                            }
                            if($data == "file_path"){
                                $file_path = $key;
                            }
                            if($data == "full_path"){
                                $full_path = $key;
                            }
                            if($data == "raw_name"){
                                $raw_name = $key;
                            }
                             if($data == "orig_name"){
                                $orig_name = $key;
                            }
                            if($data == "file_ext"){
                                $file_ext = $key;
                            }
                            if($data == "file_size"){
                                $file_size = $key;
                            }
                        }
                        $data_img = array(
                            'file_name' => $file_name,
                            'file_type' => $file_type,
                            'file_path' => $file_path,
                            'raw_name' => $raw_name,
                            'orig_name' => $orig_name,
                            'file_ext' => $file_ext,
                            'file_size' => $file_size,
                            'date' => date("Y-m-d H:i:s"),
                            'used' => 0
                        );
                        playlist_model::insert_new_video($data_img);
                        //$data_trans = array(
                            //'filename' => $file_name,
                           // 'msg' => "File successfully uploaded" . " " . $file_name
                        //);
                        //$this->load->view("files/clients/ajax/filename_success", $data_trans);
                        /*echo '<div class="alert alert-success alert-dismissable">
                                        <i class="fa fa-check"></i>
                                        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                                        <b>Alert!</b> File successfully uploaded : uploads/
                                            ' . $_FILES['file']['name'] . "</div>";*/
                    }
                }
            }
        } else {
            echo '<div class="alert alert-danger alert-dismissable">
                                        <i class="fa fa-ban"></i>
                                        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                                        Please choose a file
                                            '     ;
        }
    }
    function upload_new_files(){
        $this->load->view("new_upload_files");
    }
    function uploadftp(){
	    // connect and login to FTP server
	$ftp_server = "ftp.inventory.xp3.biz";
	$ftp_conn = ftp_connect($ftp_server) or die("Could not connect to $ftp_server");
	$login = ftp_login($ftp_conn, 'inventory.xp3.biz', 'nigthmare0');
	
	$file = "C:\Users\RMNI-Programmer\Desktop\s - Copy.txt";
	
	// upload file
	if (ftp_put($ftp_conn, "serverfile.txt", $file, FTP_ASCII))
	  {
	  echo "Successfully uploaded $file.";
	  }
	else
	  {
	  echo "Error uploading $file.";
	  }
	
	// close connection
	ftp_close($ftp_conn);
    }
    
    
    
    
    function get_all_location(){
        $data = $this->db->query("select * from locations");
        return $data->result();
    }
    function update_stats($loc_code, $data){
        $this->db->where('location_code', $loc_code);
         $this->db->update('locations', $data);
    }
    
}

// notes ::::::::::::: https://stackoverflow.com/questions/10881476/why-is-the-upload-path-not-valid-codeigniter