<?php
defined('BASEPATH') OR exit('No direct script access allowed');
/*Load all parser library*/
require "vendor/autoload.php";
use Sunra\PhpSimple\HtmlDomParser; // lib html parser
use stringEncode\Encode; // lib html parser
use PHPHtmlParser\Dom; // lib html parser
use FastSimpleHTMLDom\Document; // lib html parser
class Notfound extends CI_Controller {

	function __construct(){
		parent::__construct();		
		$this->load->helper('url');
		$this->load->library('form_validation');
		$this->load->helper('form');
		$this->load->library('form_validation');
        date_default_timezone_set('Asia/Jakarta'); // default time zone indonesia
	}
	
	function index(){
			$data['title_bar'] = "Page Not Found - Kalkulator Valuasi Teknologi";
			$data['header_page'] = "Kalkulator Valuasi Teknologi";
            $this->load->view('notfound/header', $data);
            $this->load->view('notfound/navbar', $data);
			$this->load->view('notfound/index', $data);
			$this->load->view('notfound/footer', $data);
	}
  
}