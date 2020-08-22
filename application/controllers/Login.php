<?php
defined('BASEPATH') OR exit('No direct script access allowed');
/*Load all parser library*/
require "vendor/autoload.php";
use Sunra\PhpSimple\HtmlDomParser; // lib html parser
use stringEncode\Encode; // lib html parser
use PHPHtmlParser\Dom; // lib html parser
use FastSimpleHTMLDom\Document; // lib html parser
class Login extends CI_Controller {

	function __construct(){
		parent::__construct();		
		$this->load->helper('url');
		$this->load->library('form_validation');
		$this->load->helper('form');
		$this->load->library('form_validation');
    	date_default_timezone_set('Asia/Jakarta'); // default time zone indonesia
	}
	
	public function index()
	{
        $data['title_bar'] = "";
        $data['header_page'] = "";
        $this->load->view('header', $data);
        $this->load->view('login', $data);
        $this->load->view('footer', $data);
  	}
	
	public function process_login(){
		$token = $this->input->post('token', TRUE);
		$userdetails = $this->input->post('userdetails', TRUE);
		$data_session = array(
			'token' => $token,
			'userdetails' => $userdetails
		);
		$this->session->set_userdata($data_session);
		echo json_encode($data_session);
	}

	public function logout(){
		$this->session->unset_userdata($newdata);
        $this->session->sess_destroy();
        redirect(base_url(""));
	}
}