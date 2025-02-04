<?php defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * Class Auth
 * @property input $input
 * @property session $session
 * @property check_is_block_list $check_is_block_list
 * @property check_is_bad_guy $check_is_bad_guy
 * @property post $post
 */

class Contact extends Public_Controller {

    public function __construct()
    {
        parent::__construct();
    }
    
    public function insert()
    {
        $csrfkey = $this->input->post($this->session->userdata('csrfkey'));
        if ($csrfkey && $csrfkey === $this->session->userdata('csrfvalue')) {
            if (valid_csrf_nonce()) {
                $this->session->set_flashdata('message', '請勿重複提交表單！');
                $check1 = $this->check_is_block_list($this->input->post('email'));
                if($check1==false){
                redirect($_SERVER['HTTP_REFERER']);
            }

            $check = $this->check_is_bad_guy($this->post('email'), $this->post('product_id'));

            if($check==true){}
            $data = array(
                'contact_name' => $this->post('contact_name'),
                'contact_email' => $this->post('contact_email'),
                'contact_phone' => $this->post('contact_phone'),
                'contact_content' => $this->post('contact_content'),
                'created_at' => date('Y-m-d H:i:s'),
            );
            $this->db->insert('contact_messages', $data);
            $this->session->set_flashdata('message', '感謝您的來信，我們將盡快回覆您！');
            redirect($_SERVER['HTTP_REFERER']);
        } else {
            $this->session->set_flashdata('message', '請勿重複提交表單！');
            redirect($_SERVER['HTTP_REFERER']);
            }
        }
    }


    public function index()
    {
        $this->data['page_title'] = '聯絡我們';
        $this->render('contact'); 
    }
}