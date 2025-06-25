<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Order_model extends CI_Model {

    public function __construct() {
        parent::__construct();
    }

    public function create_order($data)
    {
        $this->db->insert('orders', $data);
        return $this->db->insert_id();
    }

    public function insert_order_item($data)
    {
        $this->db->insert('order_item', array(
        'order_id' => $data['order_id'],
        'product_id' => $data['product_id'],
        'qty' => $data['qty'],
        'price' => $data['price'],
        'subtotal' => $data['qty'] * $data['price'],
        'created_at' => date('Y-m-d H:i:s'),
    ));
    }
}