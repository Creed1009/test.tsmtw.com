<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * @property data $data
 * @property view $view
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

    public function add() 
    {
        $data = array(
            'id'    => $this->input->post('product_id'),
            'name'  => $this->input->post('product_name'),
            'price' => $this->input->post('price'),
            'qty'   => $this->input->post('qty')
        );

        $this->cart->insert($data);
        redirect('cart');
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