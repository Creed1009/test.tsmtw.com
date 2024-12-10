<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Shop_ad extends Admin_Controller {

    public function __construct()
    {
        parent::__construct();
        $this->load->model('shop_ad_model');
    }

    public function index()
    {
        $this->data['page_title'] = '商品廣告';

        $data = array();
        //total rows count
        $totalRec = count($this->shop_ad_model->getRows());
        //pagination configuration
        $config['target']      = '#datatable';
        $config['base_url']    = base_url().'admin/shop_ad/ajaxData';
        $config['total_rows']  = $totalRec;
        $config['per_page']    = $this->perPage;
        $config['link_func']   = 'searchFilter';
        $this->ajax_pagination_admin->initialize($config);
        //get the posts data
        $this->data['shop_ad'] = $this->shop_ad_model->getRows(array('limit'=>$this->perPage));

        $this->render('admin/shop_ad/index');
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
        $keywords = $this->input->post('keywords');
        $sortBy = $this->input->post('sortBy');
        $category = $this->input->post('category');
        $status = $this->input->post('status');
        if(!empty($keywords)){
            $conditions['search']['keywords'] = $keywords;
        }
        if(!empty($sortBy)){
            $conditions['search']['sortBy'] = $sortBy;
        }
        if(!empty($category)){
            $conditions['search']['category'] = $category;
        }
        if(!empty($status)){
            $conditions['search']['status'] = $status;
        }
        //total rows count
        $totalRec = count($this->shop_ad_model->getRows($conditions));
        //pagination configuration
        $config['target']      = '#datatable';
        $config['base_url']    = base_url().'admin/shop_ad/ajaxData';
        $config['total_rows']  = $totalRec;
        $config['per_page']    = $this->perPage;
        $config['link_func']   = 'searchFilter';
        $this->ajax_pagination_admin->initialize($config);
        //set start and limit
        $conditions['start'] = $offset;
        $conditions['limit'] = $this->perPage;
        //get posts data
        $this->data['shop_ad'] = $this->shop_ad_model->getRows($conditions);
        //load the view
        $this->load->view('admin/shop_ad/ajax-data', $this->data, false);
    }

    public function create()
    {
        $this->data['page_title'] = '新增商品廣告';
        $this->render('admin/shop_ad/create');
    }

    public function insert()
    {
        if(empty($this->input->post('shop_ad_image'))){
            $image = 'no-image.jpg';
        } else {
            $image = $this->input->post('shop_ad_image');
        }
        $data = array(
            'shop_ad_image' => $image,
            'shop_ad_link'  => check_link($this->input->post('shop_ad_link')),
            'shop_ad_sort'  => $this->input->post('shop_ad_sort'),
            'creator_id'    => $this->ion_auth->user()->row()->id,
            'created_at'    => date('Y-m-d H:i:s'),
        );

        $this->db->insert('shop_ad', $data);
        $this->session->set_flashdata('message', '商品廣告建立成功！');
        redirect( base_url() . 'admin/shop_ad');
    }

    public function edit($id)
    {
        $this->data['page_title'] = '編輯商品廣告';
        $this->data['shop_ad'] = $this->mysql_model->_select('shop_ad','shop_ad_id',$id,'row');
        $this->render('admin/shop_ad/edit');
    }

    public function update($id)
    {
        if(empty($this->input->post('shop_ad_image'))){
            $image = 'no-image.jpg';
        } else {
            $image = $this->input->post('shop_ad_image');
        }
        $data = array(
            'shop_ad_image' => $image,
            'shop_ad_link'  => check_link($this->input->post('shop_ad_link')),
            'shop_ad_sort'  => $this->input->post('shop_ad_sort'),
            'updater_id'    => $this->ion_auth->user()->row()->id,
            'updated_at'    => date('Y-m-d H:i:s'),
        );

        $this->db->where('shop_ad_id', $id);
        $this->db->update('shop_ad', $data);
        $this->session->set_flashdata('message', '商品廣告編輯成功！');
        redirect($_SERVER['HTTP_REFERER']);
    }

    // public function delete($id)
    // {
    //     $this->db->where('shop_ad_id', $id);
    //     $this->db->delete('shop_ad');
    //     $this->session->set_flashdata('message', '商品廣告刪除成功！');
    //     redirect( base_url() . 'admin/shop_ad');
    // }

    public function multiple_action()
    {
        if (!empty($this->input->post('shop_ad_id'))) {
            foreach ($this->input->post('shop_ad_id') as $shop_ad_id) {
                if($this->input->post('action')=='delete'){
                    $this->db->where('shop_ad_id', $shop_ad_id);
                    $this->db->delete('shop_ad');
                    $this->session->set_flashdata('message', '商品廣告刪除成功！');
                } elseif ($this->input->post('action')=='on_the_shelf') {
                    $data = array(
                        'shop_ad_status' => '1',
                    );
                    $this->db->where('shop_ad_id', $shop_ad_id);
                    $this->db->update('shop_ad', $data);
                    $this->session->set_flashdata('message', '商品廣告上架成功！');
                } elseif ($this->input->post('action')=='go_off_the_shelf') {
                    $data = array(
                        'shop_ad_status' => '2',
                    );
                    $this->db->where('shop_ad_id', $shop_ad_id);
                    $this->db->update('shop_ad', $data);
                    $this->session->set_flashdata('message', '商品廣告下架成功！');
                }
            }
        }
        redirect( base_url() . 'admin/shop_ad');
    }

}