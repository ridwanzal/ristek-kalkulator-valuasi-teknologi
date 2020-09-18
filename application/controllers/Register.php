<?php
defined('BASEPATH') OR exit('No direct script access allowed');
/*Load all parser library*/
require "vendor/autoload.php";
use Sunra\PhpSimple\HtmlDomParser; // lib html parser
use stringEncode\Encode; // lib html parser
use PHPHtmlParser\Dom; // lib html parser
use FastSimpleHTMLDom\Document; // lib html parser
class Register extends CI_Controller {

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
		$cek = $this->session->userdata('token');
		if($cek){
			redirect(base_url('manage'));
		}else{
			$data['title_bar'] = "Daftar";
			$data['header_page'] = "Daftar";
			$this->load->view('frontview/header', $data);
			$this->load->view('frontview/navbar', $data);
			$this->load->view('frontview/register', $data);
			$this->load->view('frontview/footer', $data);
		}
  	}
      
    public function register(){
		// $username = $this->input->post('p_username', TRUE);
        // $nama = $this->input->post('p_nama', TRUE);
		// $email = $this->input->post('p_email', TRUE);
		// $telepon = $this->input->post('p_telepon', TRUE);	
		// $password = $this->input->post('p_password', TRUE);
		
		// $data = array(
		// 	'nama_konsumen' => ''.$nama,
		// 	'no_telepon' => ''.$telepon,
		// 	'email' => ''.$email
		// );

		// $this->db->insert('konsumen', $data);
		// $check = $this->db->affected_rows() > 0;
		// if($check){
		// 	/*
		// 		jika berhasil lanjut simpan ke table user login
		// 		redirect(base_url('login'));
		// 	*/
		// 	$insert_id = $this->db->insert_id();
		// 	$data2 = array(
		// 		'id_konsumen' => ''.$insert_id,
		// 		'username' => ''.$username,
		// 		'password' => ''.md5($password),
		// 		'level' => 'konsumen'
		// 	);

		// 	$this->db->insert('user', $data2);
		// 	$check2 = $this->db->affected_rows() > 0;
		// 	if($check2) {
		// 		redirect(base_url());
		// 	}
        // }
    }
}