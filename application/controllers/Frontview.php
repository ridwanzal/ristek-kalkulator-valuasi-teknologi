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
        $data['title_bar'] = "Prosedur";
        $data['header_page'] = "Prosedur";
        $data['breadcrumbs'] = 'Prosedur';
        $this->load->view('frontview/header', $data);
        $this->load->view('frontview/navbar', $data);
        $this->load->view('frontview/components/breadcrumbs', $data);
        $this->load->view('frontview/page/prosedur', $data);
        $this->load->view('frontview/footer', $data);
    }

    function faq(){
        $data['title_bar'] = "FAQ";
        $data['header_page'] = "FAQ";
        $data['breadcrumbs'] = 'FAQ';
        $this->load->view('frontview/header', $data);
        $this->load->view('frontview/navbar', $data);
        $this->load->view('frontview/components/breadcrumbs', $data);
        $this->load->view('frontview/page/faq', $data);
        $this->load->view('frontview/footer', $data);
    }

    function kegiatan(){
        $data['title_bar'] = "Kegiatan";
        $data['header_page'] = "Kegiatan";
        $data['breadcrumbs'] = 'Kegiatan';
        $this->load->view('frontview/header', $data);
        $this->load->view('frontview/navbar', $data);
        $this->load->view('frontview/components/breadcrumbs', $data);
        $this->load->view('frontview/page/kegiatan', $data);
        $this->load->view('frontview/footer', $data);
    }

    function panduan(){
        $data['title_bar'] = "Panduan";
        $data['header_page'] = "Kegiatan";
        $data['breadcrumbs'] = 'Kegiatan';
        $this->load->view('frontview/header', $data);
        $this->load->view('frontview/navbar', $data);
        $this->load->view('frontview/components/breadcrumbs', $data);
        $this->load->view('frontview/page/panduan', $data);
        $this->load->view('frontview/footer', $data);
    }

    function kontak(){
        $data['title_bar'] = "Hubungi Kami";
        $data['header_page'] = "Hubungi Kami";
        $data['breadcrumbs'] = 'Hubungi Kami';
        $this->load->view('frontview/header', $data);
        $this->load->view('frontview/navbar', $data);
        $this->load->view('frontview/components/breadcrumbs', $data);
        $this->load->view('frontview/page/kontak', $data);
        $this->load->view('frontview/footer', $data);
    }

    function tentang(){
        $data['title_bar'] = "Tentang";
        $data['header_page'] = "Tentang";
        $data['breadcrumbs'] = 'Tentang';
        $this->load->view('frontview/header', $data);
        $this->load->view('frontview/navbar', $data);
        $this->load->view('frontview/components/breadcrumbs', $data);
        $this->load->view('frontview/page/kontak', $data);
        $this->load->view('frontview/footer', $data);
    }

    function syaratketentuan(){
        $data['title_bar'] = "Syarat dan Ketentuan";
        $data['header_page'] = "Syarat dan Ketentuan";
        $data['breadcrumbs'] = 'Syarat dan Ketentuan';
        $this->load->view('frontview/header', $data);
        $this->load->view('frontview/navbar', $data);
        $this->load->view('frontview/components/breadcrumbs', $data);
        $this->load->view('frontview/page/syarat_ketentuan', $data);
        $this->load->view('frontview/footer', $data);
    }

    function privacypolicy(){
        $data['title_bar'] = "Privacy & Policy";
        $data['header_page'] = "Privacy & Policy";
        $data['breadcrumbs'] = 'Privacy & Policy';
        $this->load->view('frontview/header', $data);
        $this->load->view('frontview/navbar', $data);
        $this->load->view('frontview/components/breadcrumbs', $data);
        $this->load->view('frontview/page/privacy_policy', $data);
        $this->load->view('frontview/footer', $data);
    }
      
    
}