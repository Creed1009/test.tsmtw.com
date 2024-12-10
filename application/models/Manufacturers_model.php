<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Manufacturers_model extends CI_Model {

    public function __construct()
    {
        parent::__construct();
        $this->load->database();
    }

    public function getAllManufacturers()
    {
        $query = $this->db->get('manufacturers');
        return $query->result();
    }

    public function getManufacturerById($id)
    {
        $this->db->where('id', $id);
        $query = $this->db->get('manufacturers');
        return $query->row();
    }

    public function addManufacturer($data)
    {
        return $this->db->insert('manufacturers', $data);
    }

    public function updateManufacturer($id, $data)
    {
        $this->db->where('id', $id);
        return $this->db->update('manufacturers', $data);
    }

    public function deleteManufacturer($id)
    {
        $this->db->where('id', $id);
        return $this->db->delete('manufacturers');
    }

    public function getManufacturersByCondition($conditions = array())
    {
        if (!empty($conditions)) {
            $this->db->where($conditions);
        }
        $query = $this->db->get('manufacturers');
        return $query->result();
    }
}
