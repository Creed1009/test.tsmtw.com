<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class Order extends Public_Controller 

{    
    public function success($order_id = null)
    {
        $data['order_id'] = $order_id;
        $data['page_title'] = '訂單成功';
        $this->load->view('pages/success', $data);
    }
}
