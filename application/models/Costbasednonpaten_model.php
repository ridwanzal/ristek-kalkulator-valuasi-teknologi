<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Costbasednonpaten_model extends CI_Model {

    private $table = "sikav_cost_nonpaten";
    public $sinta_id;
    public $cost_id;
    public $id;
    
    public function get_sinta($sinta_id)
    {
        return $this->db->get_where($this->table, ["sinta_id" => $sinta_id])->result();
    }

    public function get_cost_id($cost_id){
        return $this->db->get_where($this->table, ["id_cost" => $cost_id])->result();
    }

    public function get_id($id)
    {
        return $this->db->get_where($this->table, ["id" => $id])->result();
    }

    // insert data
    function insert($data)
    {
        $this->db->insert($this->table, $data);
    }

    // update data
    public function update($id, $data)
    {       
        $this->db->where('id', $id);
		$this->db->update($this->table, $data);
    }

    // delete data
    public function delete($id)
    {
        $this->db->delete($this->table, array("id" => $id));
    }

}

