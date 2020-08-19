<?php
defined('BASEPATH') OR exit('No direct script access allowed');
/*Load all parser library*/
require "vendor/autoload.php";
use Sunra\PhpSimple\HtmlDomParser; // lib html parser
use stringEncode\Encode; // lib html parser
use PHPHtmlParser\Dom; // lib html parser
use FastSimpleHTMLDom\Document; // lib html parser
class Admin extends CI_Controller {

	function __construct(){
		parent::__construct();		
		$this->load->helper('url');
		$this->load->library('form_validation');
		$this->load->helper('form');
		$this->load->library('form_validation');
    	      date_default_timezone_set('Asia/Jakarta'); // default time zone indonesia
	}
	
	public function produk(){
            $data['title_bar'] = "";
            $data['header_page'] = "";

            $id_user = $this->session->userdata('id_user');
            
            $query = "SELECT 
            a.*, b.*
            FROM 
            user a , 
            konsumen b 
            where a.id_konsumen = b.id_konsumen AND
            a.id_user = '$id_user' ";

            $query2 = "SELECT * FROM kategori";

            $query3 = "SELECT * FROM produk";

            $query_result = $this->db->query($query)->result();
            $query_result2 = $this->db->query($query2)->result();
            $query_result3 = $this->db->query($query3)->result();

            $data['profile'] = $query_result;
            $data['kategori'] = $query_result2;
            $data['produk'] = $query_result3;
            $this->load->view('admin/header', $data);
            $this->load->view('admin/navbar', $data);
            $this->load->view('admin/dashboard/product', $data);
            $this->load->view('admin/footer', $data);
      }

      public function pelanggan(){
            $data['title_bar'] = "";
            $data['header_page'] = "";

            $id_user = $this->session->userdata('id_user');
            
            $query = "SELECT 
            a.*, b.*
            FROM 
            user a , 
            konsumen b 
            where a.id_konsumen = b.id_konsumen AND
            a.id_user = '$id_user' ";

            $query2 = "SELECT * FROM kategori";

            $query3 = "SELECT * FROM produk";

            $query4 = "SELECT 
            a.*, b.*
            FROM 
            user a , 
            konsumen b 
            where a.id_konsumen = b.id_konsumen AND a.level = 'konsumen' ";

            $query_result = $this->db->query($query)->result();
            $query_result2 = $this->db->query($query2)->result();
            $query_result3 = $this->db->query($query3)->result();
            $query_result4 = $this->db->query($query4)->result();

            $data['profile'] = $query_result;
            $data['kategori'] = $query_result2;
            $data['produk'] = $query_result3;
            $data['pelanggan'] = $query_result4;
            $this->load->view('admin/header', $data);
            $this->load->view('admin/navbar', $data);
            $this->load->view('admin/dashboard/pelanggan', $data);
            $this->load->view('admin/footer', $data);
      }


      public function upselling(){
            $data['title_bar'] = "";
            $data['header_page'] = "";

            $id_user = $this->session->userdata('id_user');
            
            $query = "SELECT 
            a.*, b.*
            FROM 
            user a , 
            konsumen b 
            where a.id_konsumen = b.id_konsumen AND
            a.id_user = '$id_user' ";

            $query2 = "SELECT * FROM kategori";

            $query3 = "SELECT * FROM produk";

            $query4 = "SELECT 
            a.*, b.*
            FROM 
            user a , 
            konsumen b 
            where a.id_konsumen = b.id_konsumen AND a.level = 'konsumen' ";

            $query5 = "SELECT * FROM ";

            $query_result = $this->db->query($query)->result();
            $query_result2 = $this->db->query($query2)->result();
            $query_result3 = $this->db->query($query3)->result();
            $query_result4 = $this->db->query($query4)->result();

            $data['profile'] = $query_result;
            $data['kategori'] = $query_result2;
            $data['produk'] = $query_result3;
            $data['pelanggan'] = $query_result4;
            $this->load->view('admin/header', $data);
            $this->load->view('admin/navbar', $data);
            $this->load->view('admin/dashboard/upselling', $data);
            $this->load->view('admin/footer', $data);
      }

        
        // submit menggunakan ajax 
      public function category_add(){
            $nama_kategori = $this->input->post('p_nama_kategori', TRUE);
            $data = array(
                  'nama_kategori' => $nama_kategori,
            );

            $this->db->insert('kategori', $data);
            $affect_row = $this->db->affected_rows();
            if($affect_row > 0){
                  $data2 = array(
                        'status' => 'success'
                  );
                  $result = json_encode($data2);
                  echo $result;
            }else{
                  $data3 = array(
                        'status' => 'failed'
                  );
                  $result = json_encode($data3);
                  echo $result;
            }
      }

      // submit menggunakan ajax 
      public function product_add(){
            $nama_produk = $this->input->post('p_nama_produk', TRUE);
            $harga = $this->input->post('p_harga', TRUE);
            $stok = $this->input->post('p_stok', TRUE);
            $spesifikasi = $this->input->post('p_spesifikasi', TRUE);
            $id_kategori = $this->input->post('p_kategori', TRUE);
            $data = array(
                  'nama_produk' => $nama_produk,
                  'harga' => $harga,
                  'stok' => $stok,
                  'spesifikasi' => $spesifikasi,
                  'id_kategori' => $id_kategori
            );

            $this->db->insert('produk', $data);
            $affect_row = $this->db->affected_rows();
            if($affect_row > 0){
                  $data2 = array(
                        'status' => 'success'
                  );
                  $result = json_encode($data2);
                  echo $result;
            }else{
                  $data3 = array(
                        'status' => 'failed'
                  );
                  $result = json_encode($data3);
                  echo $result;
            }
      }

      public function upselling_add(){
            
      }

}