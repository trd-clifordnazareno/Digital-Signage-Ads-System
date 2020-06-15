<!-- this code is from http://www.roytuts.com/ajax-file-upload-using-codeigniter-jquery/ -->
<!-- add this $route['default_controller'] = 'ajaxupload'; -->
<?php
 
if (!defined('BASEPATH'))
    exit('No direct script access allowed');
 
/**
 * Description of ajaxupload
 *
 * @author http://roytuts.com
 */
class AjaxUpload extends CI_Controller {
 
    function __construct() {
        parent::__construct();
    }
 
    function index() {
        $this->load->view('file_upload_ajax', NULL);
    }
 
    function upload_file() {
 //echo $_POST['crawlermessage'];
 //exit;
        //upload file
        $config['upload_path'] = './js/uploads/';
        $config['allowed_types'] = '*';
        $config['max_filename'] = '255';
        //$config['encrypt_name'] = TRUE;
        $config['max_size'] = '1024'; //1 MB
 
        if (isset($_FILES['file']['name'])) {
            if (0 < $_FILES['file']['error']) {
                echo 'Error during file upload' . $_FILES['file']['error'];
            } else {
                if (file_exists('uploads/' . $_FILES['file']['name'])) {
                    echo 'File already exists : uploads/' . $_FILES['file']['name'];
                } else {
                    $this->load->library('upload', $config);
                    if (!$this->upload->do_upload('file')) {
                        echo $this->upload->display_errors();
                    } else {
                        $data = $this->upload->data();
                        foreach($data as $data =>$key){
                            echo $data. ":" . $key . "</br>";
                        }
                        echo 'File successfully uploaded : uploads/' . $_FILES['file']['name'];
                    }
                }
            }
        } else {
            echo 'Please choose a file';
        }
    }
    /*function upload_file() {
 
        //upload file
        $config['upload_path'] = './js/uploads/';
        $config['allowed_types'] = '*';
        $config['max_filename'] = '255';
        //$config['encrypt_name'] = TRUE;
        $config['max_size'] = '1024'; //1 MB
 
        if (isset($_FILES['file']['name'])) {
            if (0 < $_FILES['file']['error']) {
                echo 'Error during file upload' . $_FILES['file']['error'];
            } else {
                if (file_exists('uploads/' . $_FILES['file']['name'])) {
                    echo 'File already exists : uploads/' . $_FILES['file']['name'];
                } else {
                    $this->load->library('upload', $config);
                    if (!$this->upload->do_upload('file')) {
                        echo $this->upload->display_errors();
                    } else {
                        $data = $this->upload->data();
                        foreach($data as $data =>$key){
                            echo $data. $key . "</br>";
                        }
                        echo 'File successfully uploaded : uploads/' . $_FILES['file']['name'];
                    }
                }
            }
        } else {
            echo 'Please choose a file';
        }
    }*/
 
}