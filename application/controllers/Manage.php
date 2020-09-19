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
		$login_status = $this->session->userdata('token');
        if($login_status == NULL || $login_status == ''){
              redirect(base_url('login'));
		}
		$this->load->model('incomebased_model');
      }
      
      public function index(){
		$data['title_bar'] = "Kalkulator Valuasi Teknologi";
		$data['header_page'] = "Manage";
		$data['breadcrumbs'] = 'Manage';
		$this->load->view('admin/header', $data);
		$this->load->view('admin/navbar', $data);
		$this->load->view('admin/components/breadcrumbs_parent', $data);
		$this->load->view('admin/dashboard/index', $data);
		$this->load->view('admin/footer', $data);
	  }
	  
	  public function add_costbased(){
		$data['title_bar'] = "Cost Based";
        $data['header_page'] = "Tambah Kalkulasi baru - Cost Based";
        $data['breadcrumbs'] = 'Tambah Kalkulasi baru - Cost Based';
		$this->load->view('admin/header', $data);
		$this->load->view('admin/navbar', $data);
		$this->load->view('admin/components/breadcrumbs', $data);
		$this->load->view('admin/dashboard/methodcost', $data);
        $this->load->view('admin/footer', $data); 
	  }

	  public function add_incomebased(){
		//ambil sinta_id dari session user yang aktif
		$userdetails = $this->session->userdata('userdetails');
		$sinta_id = $userdetails['sinta_id'];
		$data['title_bar'] = "Income Based";
        $data['header_page'] = "Tambah Kalkulasi baru - Income Based";
		$data['breadcrumbs'] = 'Tambah Kalkulasi baru - Income Based';
		$data["sikav_hki"] = $this->incomebased_model->get_hki_sinta_id($sinta_id);
		$this->load->view('admin/header');
		$this->load->view('admin/navbar');
		$this->load->view('admin/components/breadcrumbs', $data);
		$this->load->view('admin/dashboard/methodincome', $data);
        $this->load->view('admin/footer', $data); 
	  }
	  
	  public function add_incomebased_invensi(){
		$data['title_bar'] = "Income Based";
        $data['header_page'] = "Tambah Invensi - Income Based";
        $data['breadcrumbs'] = 'Tambah Invensi - Income Based';
		$this->load->view('admin/header');
		$this->load->view('admin/navbar');
		$this->load->view('admin/components/breadcrumbs', $data);
		$this->load->view('admin/dashboard/methodincome_invensi', $data);
        $this->load->view('admin/footer', $data); 
	  }

	  public function edit_incomebased_invensi(){
		$hki_id = $this->uri->segment(4);
		$data['title_bar'] = "Income Based";
        $data['header_page'] = "Update Invensi - Income Based";
		$data['breadcrumbs'] = "Update Invensi - Income Based";
		$data["sikav_hki"] = $this->incomebased_model->get_hki_id($hki_id);
		$this->load->view('admin/header');
		$this->load->view('admin/navbar');
		$this->load->view('admin/components/breadcrumbs', $data);
		$this->load->view('admin/dashboard/methodincome_invensi_edit', $data);
        $this->load->view('admin/footer', $data); 
	  }
	   
	  public function add_incomebased_calculator(){
		$data['title_bar'] = "Income Based";
        $data['header_page'] = "Tambah Kalkulasi baru - Income Based";
        $data['breadcrumbs'] = 'Tambah Kalkulasi baru - Income Based';
		$this->load->view('admin/header');
		$this->load->view('admin/navbar');
		$this->load->view('admin/components/breadcrumbs', $data);
		$this->load->view('admin/dashboard/methodincome_calculator', $data);
        $this->load->view('admin/footer', $data); 
	  }

	  public function add_incomebased_calculator1(){
		$data['title_bar'] = "Income Based";
        $data['header_page'] = "Tambah Kalkulasi baru - Income Based";
        $data['breadcrumbs'] = 'Tambah Kalkulasi baru - Income Based';
		$this->load->view('admin/header');
		$this->load->view('admin/navbar');
		$this->load->view('admin/components/breadcrumbs', $data);
		$this->load->view('admin/dashboard/methodincome_calculator1', $data);
        $this->load->view('admin/footer', $data); 
	  }

	  public function add_incomebased_calculator2(){
		$data['title_bar'] = "Income Based";
        $data['header_page'] = "Tambah Kalkulasi baru - Income Based";
        $data['breadcrumbs'] = 'Tambah Kalkulasi baru - Income Based';
		$this->load->view('admin/header');
		$this->load->view('admin/navbar');
		$this->load->view('admin/components/breadcrumbs', $data);
		$this->load->view('admin/dashboard/methodincome_calculator2', $data);
        $this->load->view('admin/footer', $data); 
	  }

	  public function add_incomebased_calculator3(){
		$data['title_bar'] = "Income Based";
        $data['header_page'] = "Tambah Kalkulasi baru - Income Based";
        $data['breadcrumbs'] = 'Tambah Kalkulasi baru - Income Based';
		$this->load->view('admin/header');
		$this->load->view('admin/navbar');
		$this->load->view('admin/components/breadcrumbs', $data);
		$this->load->view('admin/dashboard/methodincome_calculator3', $data);
        $this->load->view('admin/footer', $data); 
	  }

	  public function add_incomebased_output(){
		$data['title_bar'] = "Income Based";
        $data['header_page'] = "Output - Income Based";
        $data['breadcrumbs'] = 'Output - Income Based';
		$this->load->view('admin/header');
		$this->load->view('admin/navbar');
		$this->load->view('admin/components/breadcrumbs', $data);
		$this->load->view('admin/dashboard/methodincome_output', $data);
        $this->load->view('admin/footer', $data); 
	  }
	  
	  public function add_marketbased(){
		$data['title_bar'] = "Market Based";
        $data['header_page'] = "Tambah Kalkulasi baru - Market Based";
        $data['breadcrumbs'] = 'Tambah Kalkulasi baru - Market Based';
		$this->load->view('admin/header');
		$this->load->view('admin/navbar');
		$this->load->view('admin/components/breadcrumbs', $data);
		$this->load->view('admin/dashboard/index', $data);
        $this->load->view('admin/footer', $data); 
	  }

}