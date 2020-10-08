<?php

/*
json format

object(stdClass)#21 (9) {
  ["obj_id_sinta"]=>
  string(6) "112910"
  ["obj_id_google"]=>
  string(12) "Lps3MkMAAAAJ"
  ["obj_email"]=>
  string(30) "haris.wahyudi@mercubuana.ac.id"
  ["obj_id_afiliasi"]=>
  string(4) "1066"
  ["obj_identitas_pi"]=>
  object(stdClass)#22 (6) {
    ["par_cb_nama_inventor"]=>
    string(13) "HARIS WAHYUDI"
    ["par_cb_nama_institusi"]=>
    string(23) "Universitas Mercu Buana"
    ["par_cb_unit_kerja"]=>
    string(12) "Teknik Mesin"
    ["par_cb_judul_riset"]=>
    string(71) "PENGEMBANGAN PADUAN LOGAM NANO Fe-Mn UNTUK APLIKASI BIODEGRADABLE STENT"
    ["par_pagu_riset"]=>
    string(8) "50000000"
    ["par_cb_asal_biaya"]=>
    string(17) "Dikti Kemendikbud"
  }
  ["obj_non_paten"]=>
  object(stdClass)#23 (14) {
    ["pub_np_int"]=>
    string(1) "8"
    ["pub_np_ns"]=>
    string(1) "0"
    ["buk_np_int"]=>
    string(1) "0"
    ["buk_np_ns"]=>
    string(1) "0"
    ["pub_prod_np_int"]=>
    string(1) "0"
    ["pub_prod_np_ns"]=>
    string(1) "0"
    ["pub_np_int_total"]=>
    string(3) "320"
    ["pub_np_ns_total"]=>
    string(1) "0"
    ["buk_np_int_total"]=>
    string(1) "0"
    ["buk_np_ns_total"]=>
    string(1) "0"
    ["pub_prod_np_int_total"]=>
    string(1) "0"
    ["pub_prod_np_ns_total"]=>
    string(1) "0"
    ["np_total_bobot"]=>
    string(3) "320"
    ["total_bobot_seluruh"]=>
    string(3) "320"
  }
  ["obj_paten"]=>
  object(stdClass)#25 (2) {
    ["data"]=>
    array(1) {
      [0]=>
      object(stdClass)#24 (13) {
        ["par_cb_jd_invensi"]=>
        string(45) "ALAT KERJA MULTI FUNGSI BERBASIS BUSUR PLASMA"
        ["par_cb_jenis_paten"]=>
        string(13) "paten_granted"
        ["par_cb_status_paten"]=>
        string(8) "tedaftar"
        ["par_cb_nodaftar"]=>
        string(12) "IDP000067783"
        ["par_cb_sertifikat_paten"]=>
        string(0) ""
        ["par_biaya_proses"]=>
        string(1) "0"
        ["biaya_pendaftaran"]=>
        string(6) "350000"
        ["biaya_substantif"]=>
        string(7) "3000000"
        ["biaya_percepatan"]=>
        string(6) "400000"
        ["total_biaya_permohonan"]=>
        string(7) "3750000"
        ["jumlah"]=>
        int(1)
        ["bobot"]=>
        int(14)
        ["total_bobot_per_row"]=>
        int(14)
      }
    }
    ["total_bobot_seluruh"]=>
    int(14)
  }
  ["tanggal"]=>
  string(0) ""
  ["total_atbp"]=>
  float(5845808.3832335)
}

*/
defined('BASEPATH') OR exit('No direct script access allowed');

class Costbased extends CI_Controller {
    public function __construct()
    {
        parent::__construct();
        $this->load->model('costbased_model'); 
        $this->load->model('costbasednonpaten_model'); 
        $this->load->model('costbasedpaten_model'); 
        $this->load->library('form_validation'); 
        $this->load->library('upload'); 
        $this->load->helper(array('form', 'url'));     
    }

    public function add(){
        $datas = $this->input->post('datas');
        $decode = json_decode($datas);

        $data= array(
            'id_sinta' => '' .$decode->obj_id_sinta,
            'id_google' => '' .$decode->obj_id_google,
            'id_afiliasi' => '' .$decode->obj_id_afiliasi,
            'nama_inventor' => '' .$decode->obj_identitas_pi->par_cb_nama_inventor,
            'email_inventor' => '' .$decode->obj_email,
            'institusi' => '' .$decode->obj_identitas_pi->par_cb_nama_institusi,
            'unit_kerja' => '' .$decode->obj_identitas_pi->par_cb_unit_kerja,
            'judul_penelitian' => '' .$decode->obj_identitas_pi->par_cb_judul_riset,
            'total_biaya' => ''.$decode->obj_identitas_pi->par_pagu_riset,
            'asal_biaya' => '' .$decode->obj_identitas_pi->par_cb_asal_biaya,
            'lampiran' => 'kosong',
            'ki' => ''.$decode->obj_non_paten->total_bobot_seluruh,
            'pi' => ''.$decode->obj_paten->total_bobot_seluruh,
            'atbp' => '' .$decode->total_atbp,
            'tanggal' => '2020-07-12'
        );
        $this->costbased_model->insert($data);
        $check1 = $this->db->affected_rows() > 0;
        if($check1){
            $insert_id = $this->db->insert_id();
            // sikav_cost_paten tables
            $data2 = array(
                'id_cost' => '' .$insert_id,
                'id_sinta' => ''.$decode->obj_id_sinta,
                'pub_internasional' => ''.$decode->obj_non_paten->pub_np_int,
                'pub_nasional' => ''.$decode->obj_non_paten->pub_np_ns,
                'buku_internasional' => ''.$decode->obj_non_paten->buk_np_int,
                'buku_nasional' => ''.$decode->obj_non_paten->buk_np_ns,
                'pub_prod_internasional' => ''.$decode->obj_non_paten->pub_prod_np_int,
                'pub_prod_nasional' => ''.$decode->obj_non_paten->pub_prod_np_ns,
            );
            $this->costbasednonpaten_model->insert($data2);
            $check2 = $this->db->affected_rows() > 0;
            if($check2){
                $data_paten = $decode->obj_paten->data;
                foreach ($data_paten as $item) {   
                    // var_dump($item->par_cb_jenis_paten);
                    // sikav_cost_paten tables
                    $data3 = array(
                        'id_cost' => ''.$insert_id,
                        'id_sinta' => ''.$decode->obj_id_sinta,
                        'jenis_paten' => ''.$item->par_cb_jenis_paten,
                        'status_permohonan' => ''.$item->par_cb_status_paten,
                        'no_pendaftaran' => ''.$item->par_cb_nodaftar,
                        'sertifikat' => ''.$item->par_cb_sertifikat_paten,
                        'asal_biaya_pendaftaran' => ''.$item->par_cb_jenis_paten,
                        'lampiran' => ''.$item->par_cb_jenis_paten,
                        'biaya_proses_lain' => ''.$item->par_biaya_proses,
                    );
                    $this->costbasedpaten_model->insert($data3);
                }

                echo json_encode('success');

            }


        }



        // echo '<pre>';
        // var_dump($decode);die;
        // echo '</pre>';
        /*
        send all data here
        */
        // var_dump($datas);
        // echo json_encode($datas);
    }

    public function edit(){

    }
    
    
}