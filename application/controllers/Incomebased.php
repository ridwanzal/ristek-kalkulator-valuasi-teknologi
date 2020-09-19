<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Incomebased extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        $this->load->model('incomebased_model'); 
        $this->load->library('form_validation'); 
        $this->load->library('upload'); 
        $this->load->helper(array('form', 'url'));     
    }

    public function index()
    {
        
    }
    public function add(){
        // Fungsi rules atau aturan untuk pengisian pada form (create/input dan update)
        $this->form_validation->set_rules('inventor', 'Inventor', 'trim|required');
        $this->form_validation->set_rules('judul', 'Judul', 'trim|required');
        $this->form_validation->set_rules('jenis', 'Jenis HKI', 'trim|required');
        $this->form_validation->set_rules('tahun', 'Tahun Pelaksanaan', 'trim|required'); 
        $this->form_validation->set_rules('no_daftar', 'No. Pendaftaran', 'trim|required');
        $this->form_validation->set_rules('status', 'Status', 'trim|required');
        $this->form_validation->set_rules('no_hki', 'Nomor HKI', 'trim|required');
        $this->form_validation->set_rules('url_hki', 'URL HKI', 'trim|required');
        //$this->form_validation->set_rules('dokumen_hki', 'Upload Dokumen Pendukung', 'trim|required');
        
        //ambil sinta_id dari session user yang aktif
		$userdetails = $this->session->userdata('userdetails');
        $sinta_id = $userdetails['sinta_id'];
        
        if ($this->form_validation->run() == TRUE) {
            $data= array(
                'sinta_id' => $sinta_id,
                'inventor' => $this->input->post('inventor', TRUE),
                'judul' => $this->input->post('judul', TRUE),
                'jenis' => $this->input->post('jenis', TRUE),
                'tahun' => $this->input->post('tahun', TRUE),
                'no_daftar' => $this->input->post('no_daftar', TRUE),
                'status' => $this->input->post('status', TRUE),
                'no_hki' => $this->input->post('no_hki', TRUE),
                'url_hki' => $this->input->post('url_hki', TRUE)
                //'dokumen_hki' => $this->input->post('dokumen_hki', TRUE)
            );
            $this->incomebased_model->insert($data);
            $this->session->set_flashdata('pesan','Input Data Berhasil');
            redirect('manage/add/incomebased');          
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
    public function edit($hki_id = null){
        // Fungsi rules atau aturan untuk pengisian pada form (create/input dan update)
        $this->form_validation->set_rules('inventor', 'Inventor', 'trim|required');
        $this->form_validation->set_rules('judul', 'Judul', 'trim|required');
        $this->form_validation->set_rules('jenis', 'Jenis HKI', 'trim|required');
        $this->form_validation->set_rules('tahun', 'Tahun Pelaksanaan', 'trim|required'); 
        $this->form_validation->set_rules('no_daftar', 'No. Pendaftaran', 'trim|required');
        $this->form_validation->set_rules('status', 'Status', 'trim|required');
        $this->form_validation->set_rules('no_hki', 'Nomor HKI', 'trim|required');
        $this->form_validation->set_rules('url_hki', 'URL HKI', 'trim|required');
        //$this->form_validation->set_rules('dokumen_hki', 'Upload Dokumen Pendukung', 'trim|required');
        
        //ambil sinta_id dari session user yang aktif
		$userdetails = $this->session->userdata('userdetails');
        $sinta_id = $userdetails['sinta_id'];
        $hki_id = $this->input->post('hki_id', TRUE);
        
        if ($this->form_validation->run() == TRUE) {
            $data= array(
                'sinta_id' => $sinta_id,
                'hki_id' => $this->input->post('hki_id', TRUE),
                'inventor' => $this->input->post('inventor', TRUE),
                'judul' => $this->input->post('judul', TRUE),
                'jenis' => $this->input->post('jenis', TRUE),
                'tahun' => $this->input->post('tahun', TRUE),
                'no_daftar' => $this->input->post('no_daftar', TRUE),
                'status' => $this->input->post('status', TRUE),
                'no_hki' => $this->input->post('no_hki', TRUE),
                'url_hki' => $this->input->post('url_hki', TRUE)
                //'dokumen_hki' => $this->input->post('dokumen_hki', TRUE)
            );
            $this->incomebased_model->update($hki_id, $data);
            $this->session->set_flashdata('pesan','Update Data Berhasil');
            redirect('manage/add/incomebased');          
        }else{
            //supaya pesan errornya tampil
            //kembalikan ke form input data
            $data['title_bar'] = "Income Based";
            $data['header_page'] = "Update Invensi - Income Based";
            $data['breadcrumbs'] = 'Update Invensi - Income Based';
            //$data["sikav_hki"] = $this->incomebased_model->get_hki_id($hki_id);
            $this->load->view('admin/header');
            $this->load->view('admin/navbar');
            $this->load->view('admin/components/breadcrumbs', $data);
            $this->load->view('admin/dashboard/methodincome_invensi_edit', $data);
            $this->load->view('admin/footer', $data);
        }
    }

    public function delete($hki_id){
		$hapus = $this->incomebased_model->delete($hki_id);
		if (!$hapus) {
			$this->session->set_flashdata('pesan', 'Data Berhasil Dihapus.');
		} else{
			$this->session->set_flashdata('pesan', 'Data Gagal Dihapus');
		}
		redirect('manage/add/incomebased');
    }

    public function data_halaman1(){
        $inventor = $this->input->post('inventor', TRUE);
        $periode = $this->input->post('periode', TRUE);
        $modal = $this->input->post('modal', TRUE);
        $sukubunga = $this->input->post('sukubunga', TRUE);
        $marketsize = $this->input->post('marketsize', TRUE);
        $marketshare = $this->input->post('marketshare', TRUE);
        $qty = $this->input->post('qty', TRUE);
		$data_session = array(
            'inventor' => $inventor,
            'periode' => $periode,
            'modal' => $modal,
            'sukubunga' => $sukubunga,
            'marketsize' => $marketsize,
            'marketshare' => $marketshare,
            'qty' => $qty
		);
		$this->session->set_userdata($data_session);
		echo json_encode($data_session);
    }

    public function data_halaman2(){
        $target = $this->input->post('target', TRUE);
        $marketshare_persen = $this->input->post('marketshare_persen', TRUE);
        $qty_tahun1 = $this->input->post('qty_tahun1', TRUE);
        $marketshare_tahun2 = $this->input->post('marketshare_tahun2', TRUE);
        $harga_tahun1 = $this->input->post('harga_tahun1', TRUE);
        $harga_tahun2 = $this->input->post('harga_tahun2', TRUE);
		$data_session = array(
            'target' => $target,
            'marketshare_persen' => $marketshare_persen,
            'qty_tahun1' => $qty_tahun1,
            'marketshare_tahun2' => $marketshare_tahun2,
            'harga_tahun1' => $harga_tahun1,
            'harga_tahun2' => $harga_tahun2
		);
		$this->session->set_userdata($data_session);
		echo json_encode($data_session);
    }

    public function data_halaman3(){
        $biaya_investasi = $this->input->post('biaya_investasi', TRUE);
        $biaya_riset = $this->input->post('biaya_riset', TRUE);
        $biaya_lisensi = $this->input->post('biaya_lisensi', TRUE);
        $persen_lisensi = $this->input->post('persen_lisensi', TRUE);
        $biaya_cogs = $this->input->post('biaya_cogs', TRUE);
        $biaya_tetap = $this->input->post('biaya_tetap', TRUE);
        $biaya_marketing = $this->input->post('biaya_marketing', TRUE);
        $biaya_perawatan = $this->input->post('biaya_perawatan', TRUE);
        $biaya_warehouse = $this->input->post('biaya_warehouse', TRUE);
        $biaya_depresiasi = $this->input->post('biaya_depresiasi', TRUE);
		$data_session = array(
            'biaya_investasi' => $biaya_investasi,
            'biaya_riset' => $biaya_riset,
            'biaya_lisensi' => $biaya_lisensi,
            'persen_lisensi' => $persen_lisensi,
            'biaya_cogs' => $biaya_cogs,
            'biaya_tetap' => $biaya_tetap,
            'biaya_marketing' => $biaya_marketing,
            'biaya_perawatan' => $biaya_perawatan,
            'biaya_warehouse' => $biaya_warehouse,
            'biaya_depresiasi' => $biaya_depresiasi
		);
		$this->session->set_userdata($data_session);
		echo json_encode($data_session);
    }
}

/* End of file Incomebased.php */
