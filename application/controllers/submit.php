<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

class Submit extends CI_Controller {
    function __construct()
        {
        parent::__construct();
        $this->load->helper(array('html', 'url'));
        }

        public function index()
        {
        ini_set('max_execution_time', 900);
        $this->load->model('filesupload');

        $data = $this->filesupload->setFiles();

        echo '<pre>';
        print_r($data);

    }
}