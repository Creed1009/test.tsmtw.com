<?php defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * @property Mysql_model $mysql_model
 */

class Contact extends Public_Controller {

    public function __construct()
    {
        parent::__construct();
        $this->load->model('mysql_model');
    }

    public function index()
	{
		$this->data['page_title'] = '聯絡我們';

		$this->render('pages/contact');
	}

    public function insert()
    {
        // $csrfkey = $this->input->post($this->session->userdata('csrfkey'));
        // if ($csrfkey && $csrfkey === $this->session->userdata('csrfvalue')) {
        //     if (valid_csrf_nonce()) {

        //         $this->session->set_flashdata('message', '發送表單失敗，請在試一次！');
        //         $check1 = $this->check_is_block_list($this->input->post('email'));
        //         if($check1==false){
        //             redirect($_SERVER['HTTP_REFERER']);
        //         }

                // $check = $this->check_is_bad_guy($this->input->post('email'), $this->input->post('product_id'));

                // if($check==true){
                    $data = array(
                        'contact_user'       => $this->input->post('name'),
                        'contact_school'     => $this->input->post('school'),
                        'contact_product_id' => $this->input->post('product_id'),
                        'contact_phone'      => $this->input->post('phone'),
                        'contact_email'      => $this->input->post('email'),
                        'contact_subject'    => $this->input->post('product_title').' - '.$this->input->post('subject'),
                        'contact_messages'    => $this->input->post('content'),
                        'created_at'         => date('Y-m-d H:i:s'),
                    );
                    if($this->mysql_model->_insert('contact',$data)){
                        $this->session->set_flashdata('message', '表單發送成功！非常感謝您的反應與建議。');
                    } else {
                        $this->session->set_flashdata('message'. '表單發送失敗，請稍後再試。');
                    }
                // }
            // }
        // }
        redirect($_SERVER['HTTP_REFERER']);
    }

    // public function check_is_block_list($email)
    // {
    //     $this->db->where('email', $email);
    //     $this->db->limit(1);
    //     $query = $this->db->get('block_list');
    //     if ($query->num_rows() > 0) {
    //         return false;
    //     }
    //     return true;
    // }

    // public function check_is_bad_guy($email, $product_id)
    // {
    //     $this->db->where('contact_email', $email);
    //     $this->db->where('contact_product_id', $product_id);
    //     $this->db->where('left(created_at, 10) = ', date('Y-m-d'));
    //     $query = $this->db->get('contact');
    //     if ($query->num_rows() > 1) {
    //         $data = array(
    //             'email' => $this->input->post('email'),
    //             'created_at' => date('Y-m-d H:i:s'),
    //         );
    //         $this->db->insert('block_list', $data);
    //         return false;
    //     }
    //     return true;
    // }

}