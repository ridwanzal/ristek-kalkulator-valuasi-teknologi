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
	
	public function login(){
		$username = $this->input->post('p_username', TRUE);
        $password = $this->input->post('p_password', TRUE);
		$encrypted_mypassword=md5($password);
		
		$query="SELECT 
				a.id_user as id_user, 
				a.level as level 
				FROM 
				user a , 
				konsumen b 
				where a.id_konsumen = b.id_konsumen 
				AND a.username = '$username' AND a.password = '$encrypted_mypassword'";
        $query_result = $this->db->query($query)->result_array();
        if(count($query_result) > 0){
          for($i=0; $i<count($query_result); $i++){
            $data_session = array(
			  'id_user' => $query_result[$i]['id_user'],
			  'id_konsumen' => $query_result[$i]['id_konsumen'],
			  'level' => $query_result[$i]['level'],
              'status' => 'login'
            );
          }
          $this->session->set_flashdata('key', 1);
			$this->session->set_userdata($data_session);	
          	redirect(base_url(''));
        }else{
          if($username == ''){
            $this->session->set_flashdata('error', 'Maaf, Login Gagal');
                    redirect(base_url("login"));
          }
          $this->session->set_flashdata('error', 'Maaf, Login Gagal');
                redirect(base_url("login"));
        }

	}

	public function logout(){
		$this->session->unset_userdata($newdata);
        $this->session->sess_destroy();
        redirect(base_url(""));
	}
}