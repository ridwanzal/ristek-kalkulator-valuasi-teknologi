<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Incomebased_model extends CI_Model {

    private $table = "sikav_income_hki";
    private $table2 = "sikav_income_discount";
    private $table3 = "sikav_income_kalkulasi";
    public $sinta_id;
    public $hki_id;
    
    // tampilkan hanya data berdasarkan Sinta ID
    public function get_hki_sinta_id($sinta_id)
    {
        return $this->db->get_where($this->table, ["sinta_id" => $sinta_id])->result();
    }

    // tampilkan hanya data Kalkulasi berdasarkan Sinta ID
    public function get_kalkulasi_sinta_id($sinta_id)
    {
        return $this->db->get_where($this->table3, ["sinta_id" => $sinta_id])->result();
    }

    // tampilkan hanya data berdasarkan HKI ID
    public function get_hki_id($hki_id)
    {
        return $this->db->get_where($this->table, ["hki_id" => $hki_id])->result();
    }

    // mencari item IPR berdasarkan ID
    function getById($id){
        return $this->db->get_where($this->table, ["id" => $id])->row();
    }

    // mencari item IPR berdasarkan ID
    function cek_hki_kalkulasi($hki_id){
        return $this->db->get_where($this->table3, ["hki_id" => $hki_id])->row();
    }

    // insert data
    function insert($data)
    {
        $this->db->insert($this->table, $data);
    }

    // update data HKI
    public function update($hki_id, $data)
    {       
        $this->db->where('hki_id', $hki_id);
		$this->db->update($this->table, $data);
    }

    // update data kalkulasi 
    public function update_kalkulasi($hki_id, $data)
    {       
        $this->db->where('hki_id', $hki_id);
		$this->db->update($this->table3, $data);
    }

    // delete data
    public function delete($hki_id)
    {
        $this->db->delete($this->table, array("hki_id" => $hki_id));
    }

    // tampilkan seluruh data Discount Factor
    public function get_discount_factor(){
        return $this->db->get($this->table2)->result();        
    }

    // tampilkan Discount Factor berdasarkan item prosentase terpilih
    public function get_discount_factor_item($item){
        //$this->db->select('title, content, date');
        //$query = $this->db->get('mytable');
        if($item=="4%"){
            $this->db->select('d_4 AS df');
        }elseif($item=="5%"){
            $this->db->select('d_5 AS df');
        }elseif($item=="6%"){
            $this->db->select('d_6 AS df');
        }elseif($item=="7%"){
            $this->db->select('d_7 AS df');
        }elseif($item=="8%"){
            $this->db->select('d_8 AS df');
        }elseif($item=="9%"){
            $this->db->select('d_9 AS df');
        }elseif($item=="10%"){
            $this->db->select('d_10 AS df');
        }elseif($item=="11%"){
            $this->db->select('d_11 AS df');
        }elseif($item=="12%"){
            $this->db->select('d_12 AS df');
        }elseif($item=="13%"){
            $this->db->select('d_13 AS df');
        }elseif($item=="14%"){
            $this->db->select('d_14 AS df');
        }elseif($item=="15%"){
            $this->db->select('d_15 AS df');
        }elseif($item=="20%"){
            $this->db->select('d_20 AS df');
        }elseif($item=="25%"){
            $this->db->select('d_25 AS df');
        }elseif($item=="30%"){
            $this->db->select('d_30 AS df');
        }
        return $this->db->get($this->table2)->result();        
    }

    // insert data hasil kalkulasi
    function insert_kalkulasi($data)
    {
        $this->db->insert($this->table3, $data);
    }

}

/* End of file Incomebased_model.php */
