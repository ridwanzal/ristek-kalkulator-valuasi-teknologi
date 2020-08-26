<?php
defined('BASEPATH') OR exit('No direct script access allowed');
/*Load all parser library*/
require "vendor/autoload.php";
use Sunra\PhpSimple\HtmlDomParser; // lib html parser
use stringEncode\Encode; // lib html parser
use PHPHtmlParser\Dom; // lib html parser
use FastSimpleHTMLDom\Document; // lib html parser
class Frontview extends CI_Controller {

	function __construct(){
		parent::__construct();		
		$this->load->helper('url');
		$this->load->library('form_validation');
		$this->load->helper('form');
		$this->load->library('form_validation');
		date_default_timezone_set('Asia/Jakarta'); // default time zone indonesia
      }

    function prosedur(){
        $data['title_bar'] = "Kalkulator Valuasi Teknologi";
        $data['header_page'] = "Prosedur";
        $data['breadcrumbs'] = 'Prosedur';
        $this->load->view('frontview/header', $data);
        $this->load->view('frontview/navbar', $data);
        $this->load->view('frontview/components/breadcrumbs', $data);
        $this->load->view('frontview/page/prosedur', $data);
        $this->load->view('frontview/footer', $data);
    }

    function faq(){
        $data['title_bar'] = "Kalkulator Valuasi Teknologi";
        $data['header_page'] = "FAQ";
        $data['breadcrumbs'] = 'FAQ';
        $this->load->view('frontview/header', $data);
        $this->load->view('frontview/navbar', $data);
        $this->load->view('frontview/components/breadcrumbs', $data);
        $this->load->view('frontview/page/faq', $data);
        $this->load->view('frontview/footer', $data);
    }

    function kegiatan(){
        $data['title_bar'] = "Kalkulator Valuasi Teknologi";
        $data['header_page'] = "Kegiatan";
        $data['breadcrumbs'] = 'Kegiatan';
        $this->load->view('frontview/header', $data);
        $this->load->view('frontview/navbar', $data);
        $this->load->view('frontview/components/breadcrumbs', $data);
        $this->load->view('frontview/page/kegiatan', $data);
        $this->load->view('frontview/footer', $data);
    }

    function panduan(){
        $data['title_bar'] = "Kalkulator Valuasi Teknologi";
        $data['header_page'] = "Kegiatan";
        $data['breadcrumbs'] = 'Kegiatan';
        $this->load->view('frontview/header', $data);
        $this->load->view('frontview/navbar', $data);
        $this->load->view('frontview/components/breadcrumbs', $data);
        $this->load->view('frontview/page/panduan', $data);
        $this->load->view('frontview/footer', $data);
    }

    function kontak(){
        $data['title_bar'] = "Kalkulator Valuasi Teknologi";
        $data['header_page'] = "Kontak";
        $data['breadcrumbs'] = 'Kontak';
        $this->load->view('frontview/header', $data);
        $this->load->view('frontview/navbar', $data);
        $this->load->view('frontview/components/breadcrumbs', $data);
        $this->load->view('frontview/page/kontak', $data);
        $this->load->view('frontview/footer', $data);
    }

    function tentang(){
        $data['title_bar'] = "Kalkulator Valuasi Teknologi";
        $data['header_page'] = "Tentang";
        $data['breadcrumbs'] = 'Tentang';
        $this->load->view('frontview/header', $data);
        $this->load->view('frontview/navbar', $data);
        $this->load->view('frontview/components/breadcrumbs', $data);
        $this->load->view('frontview/page/kontak', $data);
        $this->load->view('frontview/footer', $data);
    }
      
    
}