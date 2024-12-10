<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Contact extends Admin_Controller {

    public function __construct()
    {
        parent::__construct();
        $this->load->model('contact_model');
    }

    public function index()
    {
        $this->data['page_title'] = '會員回饋';

        $data = array();
        //total rows count
        $totalRec = count($this->contact_model->getRows());
        //pagination configuration
        $config['target']      = '#datatable';
        $config['base_url']    = base_url().'admin/contact/ajaxData';
        $config['total_rows']  = $totalRec;
        $config['per_page']    = $this->perPage;
        $config['link_func']   = 'searchFilter';
        $this->ajax_pagination_admin->initialize($config);
        //get the contact data
        $this->data['contact'] = $this->contact_model->getRows(array('limit'=>$this->perPage));

        $this->render('admin/contact/index');
    }

    function ajaxData()
    {
        $conditions = array();
        //calc offset number
        $page = $this->input->post('page');
        if(!$page){
            $offset = 0;
        } else {
            $offset = $page;
        }
        //set conditions for search
        $keywords = $this->input->get('keywords');
        $sortBy = $this->input->get('sortBy');
        // $status = $this->input->get('status');
        if(!empty($keywords)){
            $conditions['search']['keywords'] = $keywords;
        }
        if(!empty($sortBy)){
            $conditions['search']['sortBy'] = $sortBy;
        }
        // if(!empty($status)){
        //     $conditions['search']['status'] = $status;
        // }
        //total rows count
        $totalRec = count($this->contact_model->getRows($conditions));
        //pagination configuration
        $config['target']      = '#datatable';
        $config['base_url']    = base_url().'admin/contact/ajaxData';
        $config['total_rows']  = $totalRec;
        $config['per_page']    = $this->perPage;
        $config['link_func']   = 'searchFilter';
        $this->ajax_pagination_admin->initialize($config);
        //set start and limit
        $conditions['start'] = $offset;
        $conditions['limit'] = $this->perPage;
        //get contact data
        $this->data['contact'] = $this->contact_model->getRows($conditions);
        //load the view
        $this->load->view('admin/contact/ajax-data', $this->data, false);
    }

    // public function create()
    // {
    //     $this->data['page_title'] = '新增會員回饋';
    //     $this->render('admin/contact/create');
    // }

    // public function insert()
    // {
    //     $data = array(
    //         'contact_category' => $this->input->post('contact_category'),
    //         'contact_title'    => $this->input->post('contact_title'),
    //         'contact_href'     => $this->input->post('contact_href'),
    //         'contact_image'    => $this->input->post('contact_image'),
    //         'creator_id'    => $this->ion_auth->user()->row()->id,
    //         'created_at'    => date('Y-m-d H:i:s'),
    //     );

    //     $this->mysql_model->_insert('contact',$data);

    //     $this->session->set_flashdata('message', '會員回饋建立成功！');
    //     redirect( base_url() . 'admin/contact');
    // }

    // public function edit($id)
    // {
    //     $this->data['page_title'] = '編輯會員回饋';
    //     $this->data['contact'] = $this->mysql_model->_select('contact','contact_id',$id,'row');
    //     $this->render('admin/contact/edit');
    // }

    // public function update($id)
    // {
    //     $data = array(
    //         'contact_category' => $this->input->post('contact_category'),
    //         'contact_title'    => $this->input->post('contact_title'),
    //         'contact_href'     => $this->input->post('contact_href'),
    //         'contact_image'    => $this->input->post('contact_image'),
    //         'updater_id'    => $this->ion_auth->user()->row()->id,
    //         'updated_at'    => date('Y-m-d H:i:s'),
    //     );

    //     $this->db->where('contact_id', $id);
    //     $this->db->update('contact', $data);

    //     $this->session->set_flashdata('message', '會員回饋更新成功！');
    //     redirect($_SERVER['HTTP_REFERER']);
    // }

    public function view($id)
    {
        $this->data['page_title'] = '查看會員回饋';

        // 更新查看狀態
        $data = array(
            'contact_is_view' => 1,
        );
        $this->db->where('contact_id', $id);
        $this->db->update('contact', $data);

        $this->data['contact'] = $this->mysql_model->_select('contact','contact_id',$id,'row');
        $this->render('admin/contact/view');
    }

    public function delete($id)
    {
        $this->db->where('contact_id', $id);
        $this->db->delete('contact');

        $this->session->set_flashdata('message', '會員回饋刪除成功！');
        redirect( base_url() . 'admin/contact');
    }

    public function get_count()
    {
        if($this->ion_auth->is_admin()){
            $this->db->where('contact_is_view', 0);
            echo $this->db->count_all_results('contact');
        } else {
            $school = $this->ion_auth->user()->row()->school;
            $this->db->where('contact_school', $school);
            $this->db->where('contact_is_view', 0);
            echo $this->db->count_all_results('contact');
        }
        // $query = $this->db->get('contact');
        // if(!empty($query->result_array())) {
        //     //$count=0;
        //     $product_safe_stock=0;
        //     foreach($query->result_array() as $data) {
        //         if(get_product_total_stock($data['product_id']) < $data['product_safe_stock']) {
        //             //$count++;
        //             $product_safe_stock++;
        //         }
        //     }
        // }
        // if($product_safe_stock>0){
        //     echo $product_safe_stock;
        // } else {
        //     echo 0;
        // }
    }

}