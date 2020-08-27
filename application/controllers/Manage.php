<?php
defined('BASEPATH') OR exit('No direct script access allowed');
/*Load all parser library*/
require "vendor/autoload.php";
use Sunra\PhpSimple\HtmlDomParser; // lib html parser
use stringEncode\Encode; // lib html parser
use PHPHtmlParser\Dom; // lib html parser
use FastSimpleHTMLDom\Document; // lib html parser
class Manage extends CI_Controller {

	function __construct(){
		parent::__construct();		
		$this->load->helper('url');
		$this->load->library('form_validation');
		$this->load->helper('form');
		$this->load->library('form_validation');
		date_default_timezone_set('Asia/Jakarta'); // default time zone indonesia
		// $login_status = $this->session->userdata('token');
        // if($login_status == NULL || $login_status == ''){
        //       redirect(base_url('login'));
        // }
      }
      
      public function index(){
		$data['title_bar'] = "Kalkulator Valuasi Teknologi";
        $data['header_page'] = "Kalkulasi baru";
        $data['breadcrumbs'] = 'Kalkulasi baru';
		$this->load->view('admin/header');
		$this->load->view('admin/navbar');
		$this->load->view('admin/dashboard/index');
        $this->load->view('admin/footer');
	  }
	  
	  public function add_costbased(){
		$data['title_bar'] = "Kalkulator Valuasi Teknologi";
        $data['header_page'] = "Tambah Kalkulasi baru - Cost Based";
        $data['breadcrumbs'] = 'Tambah Kalkulasi baru - Cost Based';
		$this->load->view('admin/header');
		$this->load->view('admin/navbar');
		$this->load->view('admin/components/breadcrumbs', $data);
		$this->load->view('admin/dashboard/methodcost');
        $this->load->view('admin/footer'); 
	  }

	  public function add_incomebased(){
		$data['title_bar'] = "Kalkulator Valuasi Teknologi";
        $data['header_page'] = "Tambah Kalkulasi baru - Income Based";
        $data['breadcrumbs'] = 'Tambah Kalkulasi baru - Income Based';
		$this->load->view('admin/header');
		$this->load->view('admin/navbar');
		$this->load->view('admin/components/breadcrumbs', $data);
		$this->load->view('admin/dashboard/methodincome');
        $this->load->view('admin/footer'); 
	  }
	  
	  public function add_marketbased(){
		$data['title_bar'] = "Kalkulator Valuasi Teknologi";
        $data['header_page'] = "Tambah Kalkulasi baru - Market Based";
        $data['breadcrumbs'] = 'Tambah Kalkulasi baru - Market Based';
		$this->load->view('admin/header');
		$this->load->view('admin/navbar');
		$this->load->view('admin/components/breadcrumbs', $data);
		$this->load->view('admin/dashboard/index');
        $this->load->view('admin/footer'); 
	  }
}