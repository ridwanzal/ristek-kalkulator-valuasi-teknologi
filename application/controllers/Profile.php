<?php
defined('BASEPATH') OR exit('No direct script access allowed');
/*Load all parser library*/
require "vendor/autoload.php";
use Sunra\PhpSimple\HtmlDomParser; // lib html parser
use stringEncode\Encode; // lib html parser
use PHPHtmlParser\Dom; // lib html parser
use FastSimpleHTMLDom\Document; // lib html parser
class Profile extends CI_Controller {

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
      }
      
      public function index(){
		$data['title_bar'] = "Profile";
        $data['header_page'] = "Profile";
        $data['breadcrumbs'] = 'Profile';
		$this->load->view('admin/header', $data);
		$this->load->view('admin/navbar', $data);
		$this->load->view('admin/components/breadcrumbs_parent', $data);
		$this->load->view('admin/dashboard/profile', $data);
        $this->load->view('admin/footer', $data); 
      }
}