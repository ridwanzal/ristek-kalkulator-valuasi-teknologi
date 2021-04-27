<?php

/*
json format
{
   "obj_id_sinta":"112910",
   "obj_id_google":"Lps3MkMAAAAJ",
   "obj_email":"haris.wahyudi@mercubuana.ac.id",
   "obj_id_afiliasi":"1066",
   "obj_identitas_pi":{
      "par_cb_nama_inventor":"HARIS WAHYUDI",
      "par_cb_nama_institusi":"Universitas Mercu Buana",
      "par_cb_unit_kerja":"Teknik Mesin",
      "par_cb_judul_riset":"PENGEMBANGAN PADUAN LOGAM NANO Fe-Mn UNTUK APLIKASI BIODEGRADABLE STENT",
      "par_pagu_riset":"50000000",
      "par_cb_asal_biaya":"Dikti Kemendikbud"
   },
   "obj_non_paten":{
      "pub_np_int":"8",
      "pub_np_ns":"1",
      "buk_np_int":"1",
      "buk_np_ns":"1",
      "pub_prod_np_int":"1",
      "pub_prod_np_ns":"1",
      "pub_np_int_total":"320",
      "pub_np_ns_total":"25",
      "buk_np_int_total":"40",
      "buk_np_ns_total":"30",
      "pub_prod_np_int_total":"25",
      "pub_prod_np_ns_total":"10",
      "np_total_bobot":"450",
      "total_bobot_seluruh":"450",
      "qi":"450"
   },
   "obj_paten":{
      "data":[
         {
            "par_cb_jd_invensi":"MESIN KOMPUTER KONTROL NUMERIK ROUTER TIGA SUMBU PORTABEL",
            "par_cb_jenis_paten":"paten_granted",
            "par_cb_status_paten":"tersertifikasi",
            "par_cb_nodaftar":"P00201707747",
            "par_cb_sertifikat_paten":"IDP000057134",
            "par_cb_asal_biaya_permohonan":"",
            "par_biaya_proses":"150000",
            "biaya_pendaftaran":"350000",
            "biaya_substantif":"3000000",
            "biaya_percepatan":"400000",
            "par_tgl_daftar_paten":"2018-05-25",
            "par_tgl_hitung_paten":"2020-11-16",
            "par_selisih_tahun":"2",
            "total_biaya_permohonan":"3900000",
            "nilai_atbp_paten":8719277.108433735,
            "jumlah":1,
            "bobot":48,
            "total_bobot_per_row":48
         }
      ],
      "total_bobot_seluruh":48
   },
   "obj_paten_inflasi":{
      "data":[
         {
            "no_pendaftaran":"P00201707747",
            "tahunke":1,
            "nilai_inflasi":0,
            "nilai_atbp_paten":8719277.108433735,
            "nilai_atbp_paten_inflasi":8719277.108433735
         },
         {
            "no_pendaftaran":"P00201707747",
            "tahunke":2,
            "nilai_inflasi":"2.5",
            "nilai_atbp_paten":8719277.108433735,
            "nilai_atbp_paten_inflasi":8937259.036144579
         },
         {
            "no_pendaftaran":"P00201707747",
            "tahunke":3,
            "nilai_inflasi":"2.69",
            "nilai_atbp_paten":8719277.108433735,
            "nilai_atbp_paten_inflasi":8953825.662650602
         }
      ]
   },
   "ti":48,
   "tanggal":"",
   "pi":3900000,
   "ki":4819277.108433736,
   "total_atbp":8719277.108433735
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
        $this->load->model('costbasedpateninflasi_model'); 
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
            'qi' => ''.$decode->obj_non_paten->qi,
            'ti' => ''.$decode->ti,
            'pi' => ''.$decode->pi,
            'ki' => ''.$decode->ki,
            'atbp' => '' .$decode->total_atbp,
            'tanggal' => ''.date('Y-m-d H:i:s')
        );
        // var_dump($data);
        // die;

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
                        'judul_invensi' => ''.$item->par_cb_jd_invensi,
                        'jenis_paten' => ''.$item->par_cb_jenis_paten,
                        'status_permohonan' => ''.$item->par_cb_status_paten,
                        'no_pendaftaran' => ''.$item->par_cb_nodaftar,
                        'sertifikat' => ''.$item->par_cb_sertifikat_paten,
                        'asal_biaya_pendaftaran' => ''.$item->par_cb_asal_biaya_permohonan,
                        'lampiran' => ''.$item->par_cb_jenis_paten,
                        'biaya_proses_lain' => ''.$item->par_biaya_proses,
                        'bobot' => ''.$item->bobot,
                        'biaya_pendaftaran' => ''.$item->biaya_pendaftaran,
                        'biaya_percepatan' => ''.$item->biaya_percepatan,
                        'biaya_substantif' => ''.$item->biaya_substantif,
                        'total_bobot' => ''.$item->total_bobot_per_row
                    );
                    $this->costbasedpaten_model->insert($data3);
                  }

                  $data_paten_inflasi = $decode->obj_paten_inflasi->data;
                  foreach ($data_paten_inflasi as $item2){
                      $data4 = array(
                        'id_cost' => ''.$insert_id,
                        'id_sinta' => ''.$decode->obj_id_sinta,
                        'no_pendaftaran' => ''.$item2->no_pendaftaran,
                        'tahunke' => ''.$item2->tahunke,
                        'tanggal_daftar' => ''.$item2->tanggal_daftar,
                        'tanggal_hitung' => ''.$item2->tanggal_hitung,
                        'nilai_inflasi' => ''.$item2->nilai_inflasi,
                        'nilai_atbp_paten' => ''.$item2->nilai_atbp_paten,
                        'nilai_atbp_paten_inflasi' => ''.$item2->nilai_atbp_paten_inflasi,
                      );
                      $this->costbasedpateninflasi_model->insert($data4);
                  }

                // jika sukses send json info ke frontend utk proses lanjutan ->uploading
                $obj = new \stdClass();
                $obj->status = "success";
                $obj->insert_id = $insert_id;
                $response = json_encode($obj);
                echo $response;
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


    public function delete_kalkulasi($id){
		$hapus = $this->costbased_model->delete($id);
		if (!$hapus) {
			$this->session->set_flashdata('pesan', 'Data Berhasil Dihapus.');
		} else{
			$this->session->set_flashdata('pesan', 'Data Gagal Dihapus');
		}
		redirect('manage/riwayat');
    }

    
    
}