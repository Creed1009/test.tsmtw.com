<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

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
    $this->cart->destroy();
    redirect('cart');
    }
    public function checkout()
    {
        $this->data['page_title'] = '結帳';
        $this->render('pages/checkout');

        // 取得購物車內容
        $cart_items = $this->cart->contents();

        if (empty($cart_items)) {
            $this->session->set_flashdata('error','購物車是空的，無法結帳');
            redirect('cart');
        }
        // 準備訂單數據
        $order_data = array(
            'user_id' => $this->session->userdata['user_id'],
            'total_price' => $this->cart->total(),
            'status' => 'pending',
            'created_at' => date('Y-m-d H:i:s'),
        );

        // 插入訂單主表(order)
        $order_id = $this->Order_moder->create_order($order_data);

        if (!$order_id) {
            $this->session->set_flashdata('error', '訂單創建失敗');
            redirect('cart');
        }

        // 插入訂單詳表
        foreach ($cart_items as $item) {
            $order_item = array(
                'order_id' => $order_id,
                'product_id' => $item['id'],
                'quantity' => $item['qty'],
                'price' => $item['price'],
            );
            $this->Order_model->insert_order_item($order_item);
        }

        // 清空購物車
        $this->cart->destroy();

        // 跳轉到成功頁面
        redirect('order/success/'.$order_id);
    }
}
