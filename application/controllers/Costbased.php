<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Costbased extends CI_Controller {
    public function __construct()
    {
        parent::__construct();
        $this->load->model('costbased_model'); 
        $this->load->library('form_validation'); 
        $this->load->library('upload'); 
        $this->load->helper(array('form', 'url'));     
    }

    public function add(){

    }

    public function edit(){

    }
    
    
}