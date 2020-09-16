<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Incomebased extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        //$this->load->model('Incomebased_model'); 
        $this->load->library('form_validation'); 
        $this->load->library('upload'); 
        $this->load->helper(array('form', 'url'));     
    }

    public function index()
    {
        
    }
    public function add(){
        // Fungsi rules atau aturan untuk pengisian pada form (create/input dan update)
        $this->form_validation->set_rules('judul', 'Judul', 'trim|required');
        $this->form_validation->set_rules('jenis', 'Jenis HKI', 'trim|required');
        $this->form_validation->set_rules('tahun', 'Tahun Pelaksanaan', 'trim|required'); 
        $this->form_validation->set_rules('nodaftar', 'No. Pendaftaran', 'trim|required');
        $this->form_validation->set_rules('status', 'Status', 'trim|required');
        $this->form_validation->set_rules('nohki', 'Nomor HKI', 'trim|required');
        $this->form_validation->set_rules('url_hki', 'URL HKI', 'trim|required');
        $this->form_validation->set_rules('dokumen_hki', 'Upload Dokumen Pendukung', 'trim|required');

        if ($this->form_validation->run() == TRUE) {
            $data= array(
                'judul' => $this->input->post('judul', TRUE),
                'jenis' => $this->input->post('jenis', TRUE),
                'tahun' => $this->input->post('tahun', TRUE),
                'nodaftar' => $this->input->post('nodaftar', TRUE),
                'status' => $this->input->post('status', TRUE),
                'nohki' => $this->input->post('nohki', TRUE),
                'url_hki' => $this->input->post('url_hki', TRUE),
                'dokumen_hki' => $this->input->post('dokumen_hki', TRUE)
            );
            //tambahkan pengecekan primary key untuk level_id
            //$level_id = $this->input->post('level_id', TRUE);
            //$cek_pk = $this->leveluser_model->getById($level_id);
            //if ($cek_pk>0){
                //$this->session->set_flashdata('cek_pk','Level_ID Telah Terdapat dalam Database, Silahkan isi dengan Level_ID yang baru!');
                //redirect('leveluser/add');
            //}else{
                //$this->leveluser_model->insert($data);
                $this->session->set_flashdata('pesan','Input Data Berhasil');
            //}            
        }else{
            //supaya pesan errornya tampil
            //kembalikan ke form input data
            $data['title_bar'] = "Income Based";
            $data['header_page'] = "Tambah Invensi - Income Based";
            $data['breadcrumbs'] = 'Tambah Invensi - Income Based';
            $this->load->view('admin/header');
            $this->load->view('admin/navbar');
            $this->load->view('admin/components/breadcrumbs', $data);
            $this->load->view('admin/dashboard/methodincome_invensi', $data);
            $this->load->view('admin/footer', $data);
        }
    }

}

/* End of file Incomebased.php */
