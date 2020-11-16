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

			/**
			 * model costbased
			 */
			$this->load->model('costbased_model'); 
			$this->load->model('costbasednonpaten_model'); 
			$this->load->model('costbasedpaten_model'); 
			$this->load->model('costbasedpateninflasi_model'); 
			date_default_timezone_set('Asia/Jakarta'); // default time zone indonesia
			$login_status = $this->session->userdata('token');
			$haha = 10;
			$user_details = $this->session->userdata('userdetails');
			// $sinta_id = $user_details['sinta_id'];
			if($login_status == NULL || $login_status == ''){
				redirect(base_url('login'));
			}
			$this->load->model('incomebased_model');
		}
		
		public function index(){
			$data['title_bar'] = "Manage";
			$data['header_page'] = "Manage";
			$data['breadcrumbs'] = 'Manage';
			$this->load->view('admin/header', $data);
			$this->load->view('admin/navbar', $data);
			$this->load->view('admin/components/breadcrumbs_parent', $data);
			$this->load->view('admin/dashboard/index', $data);
			$this->load->view('admin/footer', $data);
		}

		public function riwayat(){
			$data['title_bar'] = "Riwayat";
			$data['header_page'] = "Riwayat";
			$data['breadcrumbs'] = 'Riwayat';
			$userdetails = $this->session->userdata('userdetails');
			$sinta_id = $userdetails['sinta_id'];
			$costbased = $this->costbased_model->get_sinta($sinta_id);
			$incomebased = $this->incomebased_model->get_kalkulasi_sinta_id($sinta_id);
			// var_dump($costbased); die;
			$data['costbased'] = $costbased;
			$data['incomebased'] = $incomebased;
			$this->load->view('admin/header', $data);
			$this->load->view('admin/navbar', $data);
			$this->load->view('admin/components/breadcrumbs', $data);
			$this->load->view('admin/dashboard/riwayat', $data);
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

	  	public function detail_costbased($id){
			$costbased_identity = $this->costbased_model->get_id($id);
			$costbased_nonpaten = $this->costbasednonpaten_model->get_cost_id($id);
			$costbased_paten = $this->costbasedpaten_model->get_cost_id($id);
			$costbased_pateninflasi = $this->costbasedpateninflasi_model->get_cost_id($id);

			$data['costbased_identity'] = $costbased_identity;
			$data['costbased_nonpaten'] = $costbased_nonpaten;
			$data['costbased_paten'] = $costbased_paten;
			$data['costbased_pateinflasi'] = $costbased_pateninflasi;
			
			$data['title_bar'] = "Detail Cost Based";
			$data['header_page'] = "Detail - Cost Based";
			$data['breadcrumbs'] = 'Riwayat';
			$data['breadcrumbs_detail'] = 'Detail';
			
			$this->load->view('admin/header', $data);
			$this->load->view('admin/navbar', $data);
			$this->load->view('admin/components/breadcrumbs_detail', $data);
			$this->load->view('admin/dashboard/methodcost_detail', $data);
			$this->load->view('admin/footer', $data); 
		}

		public function report_costbased($id){
			$costbased_identity = $this->costbased_model->get_id($id);
			$costbased_nonpaten = $this->costbasednonpaten_model->get_cost_id($id);
			$costbased_paten = $this->costbasedpaten_model->get_cost_id($id);
			$costbased_pateninflasi = $this->costbasedpateninflasi_model->get_cost_id($id);
	
			$data['costbased_identity'] = $costbased_identity;
			$data['costbased_nonpaten'] = $costbased_nonpaten;
			$data['costbased_paten'] = $costbased_paten;
			$data['costbased_pateninflasi'] = $costbased_pateninflasi;
							
			$data['title_bar'] = "Detail & Report Cost Based";
			$data['header_page'] = "Detail & Report - Cost Based";
			$data['breadcrumbs'] = 'Detail & Report';
			$data['breadcrumbs_detail'] = 'Detail & Report';
			
			$this->load->view('admin/header', $data);
			$this->load->view('admin/navbar', $data);
			$this->load->view('admin/components/breadcrumbs_detail', $data);
			$this->load->view('admin/dashboard/methodcost_report', $data);
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
		$this->load->view('admin/header', $data);
		$this->load->view('admin/navbar', $data);
		$this->load->view('admin/components/breadcrumbs', $data);
		$this->load->view('admin/dashboard/methodincome', $data);
        $this->load->view('admin/footer', $data); 
	  }
	  
	  public function add_incomebased_invensi(){
		$data['title_bar'] = "Income Based";
        $data['header_page'] = "Tambah Invensi - Income Based";
        $data['breadcrumbs'] = 'Tambah Invensi - Income Based';
		$this->load->view('admin/header', $data);
		$this->load->view('admin/navbar', $data);
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
		$this->load->view('admin/header', $data);
		$this->load->view('admin/navbar', $data);
		$this->load->view('admin/components/breadcrumbs', $data);
		$this->load->view('admin/dashboard/methodincome_invensi_edit', $data);
        $this->load->view('admin/footer', $data); 
	  }
	   
	  public function add_incomebased_calculator(){
		$data['title_bar'] = "Income Based";
        $data['header_page'] = "Tambah Kalkulasi baru - Income Based";
        $data['breadcrumbs'] = 'Tambah Kalkulasi baru - Income Based';
		$this->load->view('admin/header', $data);
		$this->load->view('admin/navbar', $data);
		$this->load->view('admin/components/breadcrumbs', $data);
		$this->load->view('admin/dashboard/methodincome_calculator', $data);
        $this->load->view('admin/footer', $data); 
	  }

	  public function add_incomebased_calculator1(){
		$hki_id = $this->uri->segment(4);
		$data['title_bar'] = "Income Based";
        $data['header_page'] = "Tambah Kalkulasi baru - Income Based";
		$data['breadcrumbs'] = 'Tambah Kalkulasi baru - Income Based';
		$data['sikav_hki'] = $this->incomebased_model->get_hki_id($hki_id);
		$data["sikav_discount_factor"] = $this->incomebased_model->get_discount_factor();
		$this->load->view('admin/header', $data);
		$this->load->view('admin/navbar', $data);
		$this->load->view('admin/components/breadcrumbs', $data);
		$this->load->view('admin/dashboard/methodincome_calculator1', $data);
        $this->load->view('admin/footer', $data); 
	  }

	  public function add_incomebased_calculator2(){
		$data['title_bar'] = "Income Based";
        $data['header_page'] = "Tambah Kalkulasi baru - Income Based";
        $data['breadcrumbs'] = 'Tambah Kalkulasi baru - Income Based';
		$this->load->view('admin/header', $data);
		$this->load->view('admin/navbar', $data);
		$this->load->view('admin/components/breadcrumbs', $data);
		$this->load->view('admin/dashboard/methodincome_calculator2', $data);
        $this->load->view('admin/footer', $data); 
	  }

	  public function add_incomebased_calculator3(){
		$data['title_bar'] = "Income Based";
        $data['header_page'] = "Tambah Kalkulasi baru - Income Based";
        $data['breadcrumbs'] = 'Tambah Kalkulasi baru - Income Based';
		$this->load->view('admin/header', $data);
		$this->load->view('admin/navbar', $data);
		$this->load->view('admin/components/breadcrumbs', $data);
		$this->load->view('admin/dashboard/methodincome_calculator3', $data);
        $this->load->view('admin/footer', $data); 
	  }

	  public function add_incomebased_output(){
		($this->session->userdata('discount_factor')!==null) ? $discount_factor = $this->session->userdata('discount_factor'): $discount_factor=0.00;
		$data['title_bar'] = "Income Based";
        $data['header_page'] = "Output - Income Based";
		$data['breadcrumbs'] = 'Output - Income Based';
		$data["sikav_discount_factor"] = $this->incomebased_model->get_discount_factor_item($discount_factor);
		$this->load->view('admin/header', $data);
		$this->load->view('admin/navbar', $data);
		$this->load->view('admin/components/breadcrumbs', $data);
		$this->load->view('admin/dashboard/methodincome_output', $data);
        $this->load->view('admin/footer', $data); 
	  }

	  public function report_incomebased($id){
		// ($this->session->userdata('discount_factor')!==null) ? $discount_factor = $this->session->userdata('discount_factor'): $discount_factor=0.00;
		$record_incomebased = $this->incomebased_model->get_kalkulasi($id);
		$data['record_incomebased'] = $record_incomebased;
		// $data["sikav_discount_factor"] = $this->incomebased_model->get_discount_factor_item($discount_factor);
						
		$data['title_bar'] = "Detail & Report Income Based";
		$data['header_page'] = "Detail & Report - Income Based";
		$data['breadcrumbs'] = 'Detail & Report';
		$data['breadcrumbs_detail'] = 'Detail & Report';
		
		$this->load->view('admin/header', $data);
		$this->load->view('admin/navbar', $data);
		$this->load->view('admin/components/breadcrumbs_detail', $data);
		$this->load->view('admin/dashboard/methodincome_report', $data);
		$this->load->view('admin/footer', $data); 
	}
	  
	  public function add_marketbased(){
		$data['title_bar'] = "Market Based";
        $data['header_page'] = "Tambah Kalkulasi baru - Market Based";
        $data['breadcrumbs'] = 'Tambah Kalkulasi baru - Market Based';
		$this->load->view('admin/header', $data);
		$this->load->view('admin/navbar', $data);
		$this->load->view('admin/components/breadcrumbs', $data);
		$this->load->view('admin/dashboard/index', $data);
        $this->load->view('admin/footer', $data); 
	  }

}