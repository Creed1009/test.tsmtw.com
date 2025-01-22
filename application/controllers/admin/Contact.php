<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Contact extends Public_Controller {

    public function __construct()
    {
        parent::__construct();
    }
    
    public function insert()
    {
        $csrfkey = $this->post($this->session->userdata('csrfkey'));
        if ($csrfkey && $csrfkey === $this->session->userdata('csrfvalue')) {
            $data = array(
                'contact_name' => $this->post('contact_name'),
                'contact_email' => $this->post('contact_email'),
                'contact_phone' => $this->post('contact_phone'),
                'contact_content' => $this->post('contact_content'),
                'created_at' => date('Y-m-d H:i:s'),
            );
            $this->db->insert('contact', $data);
            $this->session->set_flashdata('message', '感謝您的來信，我們將盡快回覆您！');
            redirect($_SERVER['HTTP_REFERER']);
        } else {
            $this->session->set_flashdata('message', '請勿重複提交表單！');
            redirect($_SERVER['HTTP_REFERER']);
        }
    }


    public function index()
    {
        $this->data['page_title'] = '聯絡我們';
        $this->render('contact'); 
    }
}