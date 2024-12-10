<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Email extends Admin_Controller {

    function __construct()
    {
        parent::__construct();
        $this->load->model('email_model');
    }

    public function index()
    {
        $this->data['page_title'] = '電子郵件';

        $data = array();
        //total rows count
        $totalRec = $this->email_model->getRowsCount();
        //pagination configuration
        $config['target']      = '#datatable';
        $config['base_url']    = base_url().'email/ajaxData';
        $config['total_rows']  = $totalRec;
        $config['per_page']    = $this->perPage;
        $config['link_func']   = 'searchFilter';
        $this->ajax_pagination_admin->initialize($config);
        //get the posts data
        $this->data['email'] = $this->email_model->getRows(array('limit'=>$this->perPage));

        $this->render('admin/email/index');
    }

    function ajaxData()
    {
        $conditions = array();
        //calc offset number
        $page = $this->input->get('page');
        if(!$page){
            $offset = 0;
        }else{
            $offset = $page;
        }
        //set conditions for search
        // $keywords = $this->input->get('keywords');
        // $sortBy = $this->input->get('sortBy');
        $status = $this->input->get('status');
        // if(!empty($keywords)){
        //     $conditions['search']['keywords'] = $keywords;
        // }
        // if(!empty($sortBy)){
        //     $conditions['search']['sortBy'] = $sortBy;
        // }
        if(!empty($status)){
            $conditions['search']['status'] = $status;
        }
        //total rows count
        $totalRec = $this->email_model->getRowsCount($conditions);
        //pagination configuration
        $config['target']      = '#datatable';
        $config['base_url']    = base_url().'email/ajaxData';
        $config['total_rows']  = $totalRec;
        $config['per_page']    = $this->perPage;
        $config['link_func']   = 'searchFilter';
        $this->ajax_pagination_admin->initialize($config);
        //set start and limit
        $conditions['start'] = $offset;
        $conditions['limit'] = $this->perPage;
        //get posts data
        $this->data['email'] = $this->email_model->getRows($conditions);
        //load the view
        $this->load->view('admin/email/ajax-data', $this->data, false);
    }

    public function create()
    {
        $this->data['page_title'] = '寄送電子郵件';

        $this->load->model('ion_auth_model');
        $data = array();
        //total rows count
        $totalRec = count($this->ion_auth_model->getSubscriptEmailUsers());
        //pagination configuration
        $config['target']     = '#datatable';
        $config['base_url']   = base_url().'admin/email/create_ajaxData';
        $config['total_rows'] = $totalRec;
        $config['per_page']   = $this->perPage;
        $config['link_func']  = 'getUsers';
        $this->ajax_pagination_admin->initialize($config);
        $this->data['schools'] = $this->mysql_model->_select('schools');
        $this->data['users'] = $this->ion_auth_model->getSubscriptEmailUsers(array('limit'=>$this->perPage));
        $this->data['subscription'] = $this->email_model->get_subscription();
        $this->render('admin/email/create');
    }

    function create_ajaxData()
    {
        $conditions = array();
        //calc offset number
        $page = $this->input->get('page');
        if(!$page){
            $offset = 0;
        }else{
            $offset = $page;
        }
        //set conditions for search
        // $keywords = $this->input->get('keywords');
        // $sortBy = $this->input->get('sortBy');
        $category = $this->input->get('category');
        // $status = $this->input->get('status');
        // if(!empty($keywords)){
        //     $conditions['search']['keywords'] = $keywords;
        // }
        // if(!empty($sortBy)){
        //     $conditions['search']['sortBy'] = $sortBy;
        // }
        if(!empty($category)){
            $conditions['search']['category'] = $category;
        }
        // if(!empty($status)){
        //     $conditions['search']['status'] = $status;
        // }
        //total rows count
        $totalRec = count($this->ion_auth_model->getSubscriptEmailUsers($conditions));
        //pagination configuration
        $config['target']     = '#datatable';
        $config['base_url']   = base_url().'admin/email/create_ajaxData';
        $config['total_rows'] = $totalRec;
        $config['per_page']   = $this->perPage;
        $config['link_func']  = 'getUsers';
        $this->ajax_pagination_admin->initialize($config);
        //set start and limit
        $conditions['start'] = $offset;
        $conditions['limit'] = $this->perPage;
        //get posts data
        $this->data['users'] = $this->ion_auth_model->getSubscriptEmailUsers($conditions);
        //load the view
        $this->load->view('admin/email/create-ajax-data', $this->data, false);
    }

    public function edit($id)
    {
        $this->data['page_title'] = '編輯電子郵件';
        $this->data['email'] = $this->email_model->get($id);
        $this->render('admin/email/edit');
    }

    public function update($id)
    {
        $data = array(
            'email'   => $this->input->post('email'),
            'subject' => $this->input->post('subject'),
            'body'    => $this->input->post('body'),
        );

        $this->db->where('id', $id);
        $this->db->update('send_email', $data);

        $this->session->set_flashdata('message', '電子郵件更新成功！');
        redirect($_SERVER['HTTP_REFERER']);
    }

    public function delete($id)
    {
        $this->db->where('id', $id);
        $this->db->delete('send_email');
        $this->session->set_flashdata('message', '電子郵件刪除成功！');
        redirect(base_url().'admin/email');
    }

    public function process()
    {
        $this->load->view('admin/email/process');
    }

    // public function process_email()
    // {
    //     $this->db->where('is_send', 'n');
    //     $this->db->limit(1);
    //     $query = $this->db->get('send_email');
    //     if ($query->num_rows() > 0) {
    //         $data = $query->row_array();
    //         $this->load->library('MY_phpmailer');
    //         if(CI_send_email($data['email'],$data['subject'],$data['body'])){

    //             $update_data = array(
    //                 'is_send'   => 'y',
    //                 'sended_at' => date('Y-m-d H:i:s')
    //             );
    //             $this->db->where('id', $data['id']);
    //             $this->db->update('send_email', $update_data);

    //             echo '['.date('Y-m-d H:i:s').'] 寄送 ID: '.$data['id'].' 至 '.$data['email'].' 成功。';
    //         } else {
    //             echo '00';
    //         }
    //     } else {
    //         echo '0';
    //     }
    // }

    public function add_to_process()
    {
        foreach (explode(',',$this->input->post('email')) as $email) {

            if(validate_email($email)){

                $data = array(
                    'email'      => $email,
                    'subject'    => $this->input->post('subject'),
                    'body'       => $this->input->post('body').$this->input->post('footer'),
                    'created_at' => date('Y-m-d H:i:s'),
                );
                if($this->db->insert('send_email', $data)){
                    // echo '1';
                } else {
                    // echo '0';
                }
            }

        }

        echo '1';
    }

    public function count_send_email()
    {
        $this->db->where('is_send', 'n');
        $count_item = $this->db->count_all_results('send_email');
        echo $count_item;
    }

    // public function send()
    // {
    //     $this->load->library('MY_phpmailer');
    //     foreach (explode(',',$this->input->post('email')) as $email) {
    //         if(!empty($email)){
    //             if(CI_send_email($email,$this->input->post('subject'),$this->input->post('body').$this->input->post('footer'))){
    //                 echo '1';
    //             } else {
    //                 echo '0';
    //             }
    //         }
    //     }
    // }

    public function send_now($id)
    {
        $this->db->where('id', $id);
        $query = $this->db->get('send_email');
        if ($query->num_rows() > 0) {
            $data = $query->row_array();
            // $this->load->library('MY_phpmailer');
            if(CI_send_email($data['email'],$data['subject'],$data['body'])){
                $update_data = array(
                    'is_send'   => 'y',
                    'sended_at' => date('Y-m-d H:i:s')
                );
                $this->db->where('id', $data['id']);
                $this->db->update('send_email', $update_data);
                echo '電子郵件寄送成功！';
                echo '<br><a href="#" onClick="javascript:history.back()">回上一頁</a>';
            } else {
                echo '錯誤，電子郵件寄送失敗！';
                echo '<br><a href="#" onClick="javascript:history.back()">回上一頁</a>';
            }
        }
        // redirect($_SERVER['HTTP_REFERER']);
    }

    // public function rand_send()
    // {
    //     $query = $this->db->query("SELECT * FROM `send_email` WHERE is_send = 'n' ORDER by rand() LIMIT 1;");
    //     if ($query->num_rows() > 0) {
    //         $data = $query->row_array();
    //         $this->load->library('MY_phpmailer');
    //         if(CI_send_email($data['email'],$data['subject'],$data['body'])){
    //             $update_data = array(
    //                 'is_send'   => 'y',
    //                 'sended_at' => date('Y-m-d H:i:s')
    //             );
    //             $this->db->where('id', $data['id']);
    //             $this->db->update('send_email', $update_data);
    //             echo 'O電子郵件寄送成功！';
    //         } else {
    //             echo 'X電子郵件寄送失敗！';
    //         }
    //     } else {
    //         echo '沒有未寄的電子郵件！';
    //     }
    // }

    // public function rand_send_mu()
    // {
    //     $query = $this->db->query("SELECT * FROM `send_email` WHERE is_send = 'n' ORDER by rand() LIMIT 5;");
    //     if ($query->num_rows() > 0) {
    //         // $data = $query->row_array();
    //         $this->load->library('MY_phpmailer');
    //         $count_success=0;
    //         $count_error=0;
    //         foreach($query->result_array() as $data){
    //             if(CI_send_email($data['email'],$data['subject'],$data['body'])){
    //                 $update_data = array(
    //                     'is_send'   => 'y',
    //                     'sended_at' => date('Y-m-d H:i:s')
    //                 );
    //                 $this->db->where('id', $data['id']);
    //                 $this->db->update('send_email', $update_data);
    //                 // echo 'O電子郵件寄送成功！';
    //                 $count_success++;
    //             } else {
    //                 // echo 'X電子郵件寄送失敗！';
    //                 $count_error++;
    //             }
    //         }
    //         echo '成功寄送'.$count_success.'封，';
    //         echo '寄送失敗'.$count_error.'封';
    //     } else {
    //         echo '沒有未寄的電子郵件！';
    //     }
    // }

    // public function send_test_email()
    // {
    //     // $this->load->library('MY_phpmailer');
    //     if(CI_send_email('a0935756869@gmail.com','標標標題','內內內容')){
    //         echo '1';
    //     } else {
    //         echo '0';
    //     }
    // }

    public function test()
    {
        $this->load->library('email');

        $subject = 'This is a test';
        $message = '<p>This message has been sent for testing purposes.</p>';

        // Get full html:
        $body = '<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
        <html xmlns="http://www.w3.org/1999/xhtml">
        <head>
            <meta http-equiv="Content-Type" content="text/html; charset=' . strtolower(config_item('charset')) . '" />
            <title>' . html_escape($subject) . '</title>
            <style type="text/css">
                body {
                    font-family: Arial, Verdana, Helvetica, sans-serif;
                    font-size: 16px;
                }
            </style>
        </head>
        <body>
        ' . $message . '
        </body>
        </html>';
        // Also, for getting full html you may use the following internal method:
        //$body = $this->email->full_html($subject, $message);

        $result = $this->email
            ->from('chenhuiping@lovetiyu.site')
            ->reply_to('chenhuiping@lovetiyu.site')    // Optional, an account where a human being reads.
            ->to('sianming33@gmail.com')
            ->subject($subject)
            ->message($body)
            ->send();

        var_dump($result);
        echo '<br />';
        echo $this->email->print_debugger();

        exit;
    }

    public function test2()
    {
        $htmlContent = '<h1>Sending email via SMTP server</h1>';
        $htmlContent .= '<p>This email has sent via SMTP server from CodeIgniter application.</p>';

        if(CI_send_email('a0935756869@gmail.com', 'How to send email via SMTP server in CodeIgniter', $htmlContent)){
            echo '1';
        } else {
            echo '0';
        }
    }

}