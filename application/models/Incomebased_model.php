<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Incomebased_model extends CI_Model {

    private $table = "sikav_income_hki";
    public $sinta_id;
    public $hki_id;
    
    // tampilkan hanya data berdasarkan Sinta ID
    public function get_hki_sinta_id($sinta_id)
    {
        return $this->db->get_where($this->table, ["sinta_id" => $sinta_id])->result();
    }

    // tampilkan hanya data berdasarkan Sinta ID
    public function get_hki_id($hki_id)
    {
        return $this->db->get_where($this->table, ["hki_id" => $hki_id])->result();
    }

    // mencari item IPR berdasarkan ID
    function getById($id){
        return $this->db->get_where($this->table, ["id" => $id])->row();
    }

    // insert data
    function insert($data)
    {
        $this->db->insert($this->table, $data);
    }

    // update data
    public function update($hki_id, $data)
    {       
        $this->db->where('hki_id', $hki_id);
		$this->db->update($this->table, $data);
    }

    // delete data
    public function delete($hki_id)
    {
        $this->db->delete($this->table, array("hki_id" => $hki_id));
    }

}

/* End of file Incomebased_model.php */
