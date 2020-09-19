<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Incomebased_model extends CI_Model {

    private $table = "sikav_hki";
    public $sinta_id;
    public $hki_id;
    
    // tampilkan hanya data berdasarkan Sinta ID
    public function get_hki_sinta_id($sinta_id)
    {
        return $this->db->get_where($this->table, ["sinta_id" => $sinta_id])->result();
    }

    // insert data
    function insert($data)
    {
        $this->db->insert($this->table, $data);
    }

}

/* End of file Incomebased_model.php */
