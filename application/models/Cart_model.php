<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class Cart_model extends CI_Model {

    public function __construct() {
        parent::__construct();
        $this->load->database();
    }

    public function save_item($item) {
        $data = array(
            'session_id'   => session_id(),
            'product_id'   => $item['id'],
            'product_name' => $item['name'],
            'qty'          => $item['qty'],
            'price'        => $item['price'],
            'subtotal'     => $item['subtotal'],
        );
        $this->db->insert('cart', $data);        
    }

    public function get_product($id) {
        $this->db->where('product_id', $id);
        $query = $this->db->get('products');
        return $query->row_array();
    }
}

?>