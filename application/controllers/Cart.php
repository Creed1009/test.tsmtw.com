<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * @property data $data
 * @property view $view
 * @property Cart_model $Cart_model
 * 
 */


class Cart extends CI_Controller {
    
    public function __construct() 
    {
        parent::__construct();
        $this->load->library('cart');
        $this->load->model('cart_model');
    }

    public function index()
    {
        $this->load->view('pages/cart');
    }

    public function add($id) 
    {
        $product = $this->Cart_model->get_product($id);
        $data = array(
            'id'    => $product['product_id'],
            'name'  => $product['product_id'],
            'price' => $product['product_price'],
            'qty'   => 1
        );

        $this->cart->insert($data);
        redirect($_SERVER['HTTP_REFERER']);
    }

    public function remove($rowid) 
    {
        $this->cart->destroy();
        redirect('cart');
    }

    public function save_to_db()
    {
        $cart_items = $this->cart->contents();
        foreach ($cart_items as $item) {
            $this->Cart_model->save_item($item);
        }
    $thi->cart->destroy();
    redirect('cart');
    }

}

?>