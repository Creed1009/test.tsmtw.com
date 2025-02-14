<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * @property data $data
 * @property view $view
 * @property Cart_model $Cart_model
 * 
 */


class Cart extends Public_Controller {
    
    public function __construct() 
    {
        parent::__construct();
    }

    public function index()
    {
        $this->data['page_title'] = '購物車';
        // $this->load->view('pages/cart', $this->data);
        $this->render('pages/cart');
    }

    public function add(int $id) 
    {
        $product = $this->mysql_model->_select('products', 'product_id', $id, 'row');
        $data = array(
            'id'    => $product['product_id'],
            'name'  => $product['product_title'],
            'price' => $product['product_price'],
            'qty'   => 1,
            // 'options' => array(
            //     'image' => $product['product_image'],
            // )
        );

        $this->cart->insert($data);
        // redirect($_SERVER['HTTP_REFERER']);
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