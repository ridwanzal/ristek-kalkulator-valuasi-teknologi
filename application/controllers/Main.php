<?php
defined('BASEPATH') OR exit('No direct script access allowed');
/*Load all parser library*/
require "vendor/autoload.php";
use Sunra\PhpSimple\HtmlDomParser; // lib html parser
use stringEncode\Encode; // lib html parser
use PHPHtmlParser\Dom; // lib html parser
use FastSimpleHTMLDom\Document; // lib html parser
class Main extends CI_Controller {

	function __construct(){
		parent::__construct();		
		$this->load->helper('url');
		$this->load->library('form_validation');
		$this->load->helper('form');
		$this->load->library('form_validation');
        date_default_timezone_set('Asia/Jakarta'); // default time zone indonesia
	}
	
	function index(){
		$cek = $this->session->userdata('token');
		if($cek){
			redirect(base_url('manage'));
		}else{
			$data['title_bar'] = "Kalkulator Valuasi Teknologi";
			$data['header_page'] = "Kalkulator Valuasi Teknologi";
			$this->load->view('frontview/header', $data);
			$this->load->view('frontview/navbar', $data);
			$this->load->view('frontview/index', $data);
			$this->load->view('frontview/footer', $data);
		}
	}
  
}