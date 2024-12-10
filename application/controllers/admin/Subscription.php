<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Subscription extends Admin_Controller {

    public function __construct()
    {
        parent::__construct();
        $this->load->model('subscription_model');
    }

    public function index()
    {
        $this->data['page_title'] = '訂閱者';

        $data = array();
        //total rows count
        $totalRec = count($this->subscription_model->getRows());
        //pagination configuration
        $config['target']      = '#datatable';
        $config['base_url']    = base_url().'admin/subscription/ajaxData';
        $config['total_rows']  = $totalRec;
        $config['per_page']    = $this->perPage;
        $config['link_func']   = 'searchFilter';
        $this->ajax_pagination_admin->initialize($config);
        //get the subscription data
        $this->data['subscription'] = $this->subscription_model->getRows(array('limit'=>$this->perPage));

        $this->render('admin/subscription/index');
    }

    function ajaxData()
    {
        $conditions = array();
        //calc offset number
        $page = $this->input->get('page');
        if(!$page){
            $offset = 0;
        } else {
            $offset = $page;
        }
        //set conditions for search
        $keywords = $this->input->get('keywords');
        $sortBy = $this->input->get('sortBy');
        // $category = $this->input->get('category');
        // $status = $this->input->get('status');
        if(!empty($keywords)){
            $conditions['search']['keywords'] = $keywords;
        }
        if(!empty($sortBy)){
            $conditions['search']['sortBy'] = $sortBy;
        }
        // if(!empty($category)){
        //     $conditions['search']['category'] = $category;
        // }
        // if(!empty($status)){
        //     $conditions['search']['status'] = $status;
        // }
        //total rows count
        $totalRec = count($this->subscription_model->getRows($conditions));
        //pagination configuration
        $config['target']      = '#datatable';
        $config['base_url']    = base_url().'admin/subscription/ajaxData';
        $config['total_rows']  = $totalRec;
        $config['per_page']    = $this->perPage;
        $config['link_func']   = 'searchFilter';
        $this->ajax_pagination_admin->initialize($config);
        //set start and limit
        $conditions['start'] = $offset;
        $conditions['limit'] = $this->perPage;
        //get subscription data
        $this->data['subscription'] = $this->subscription_model->getRows($conditions);
        //load the view
        $this->load->view('admin/subscription/ajax-data', $this->data, false);
    }

    // public function create()
    // {
    //     $this->data['page_title'] = '新增訂閱者';
    //     $this->render('admin/subscription/create');
    // }

    // public function insert()
    // {
    //     $data = array(
    //         'subscription_code'    => $this->input->post('subscription_code'),
    //         'subscription_name'    => $this->input->post('subscription_name'),
    //         'subscription_address' => $this->input->post('subscription_address'),
    //         'subscription_phone'   => $this->input->post('subscription_phone'),
    //         'subscription_site'    => $this->input->post('subscription_site'),
    //         'creator_id'     => $this->ion_auth->user()->row()->id,
    //         'created_at'     => date('Y-m-d H:i:s'),
    //     );

    //     $this->mysql_model->_insert('subscription',$data);

    //     $this->session->set_flashdata('message', '訂閱者建立成功！');
    //     redirect( base_url() . 'admin/subscription');
    // }

    // public function edit($id)
    // {
    //     $this->data['page_title'] = '編輯訂閱者';
    //     $this->data['subscription'] = $this->mysql_model->_select('subscription','subscription_id',$id,'row');
    //     $this->render('admin/subscription/edit');
    // }

    // public function update($id)
    // {
    //     $data = array(
    //         'subscription_code'    => $this->input->post('subscription_code'),
    //         'subscription_name'    => $this->input->post('subscription_name'),
    //         'subscription_address' => $this->input->post('subscription_address'),
    //         'subscription_phone'   => $this->input->post('subscription_phone'),
    //         'subscription_site'    => $this->input->post('subscription_site'),
    //         'updater_id'     => $this->ion_auth->user()->row()->id,
    //         'updated_at'     => date('Y-m-d H:i:s'),
    //     );

    //     $this->db->where('subscription_id', $id);
    //     $this->db->update('subscription', $data);

    //     $this->session->set_flashdata('message', '訂閱者更新成功！');
    //     redirect($_SERVER['HTTP_REFERER']);
    // }

    public function delete($id)
    {
        $this->db->where('subscription_id', $id);
        $this->db->delete('subscription');

        redirect( base_url() . 'admin/subscription');
    }

    public function multiple_action()
    {
        if (!empty($this->input->post('subscription_id'))) {
            foreach ($this->input->post('subscription_id') as $subscription_id) {
                if($this->input->post('action')=='delete'){
                    $this->db->where('subscription_id', $subscription_id);
                    $this->db->delete('subscription');
                    $this->session->set_flashdata('message', '訂閱者刪除成功！');
                }
            }
        }
        redirect( base_url() . 'admin/subscription');
    }

}