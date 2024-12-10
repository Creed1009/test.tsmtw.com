<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Shop_banner extends Admin_Controller {

    public function __construct()
    {
        parent::__construct();
        $this->load->model('shop_banner_model');
    }

    public function index()
    {
        $this->data['page_title'] = '商品輪播圖';

        $data = array();
        //total rows count
        $totalRec = count($this->shop_banner_model->getRows());
        //pagination configuration
        $config['target']      = '#datatable';
        $config['base_url']    = base_url().'admin/shop_banner/ajaxData';
        $config['total_rows']  = $totalRec;
        $config['per_page']    = $this->perPage;
        $config['link_func']   = 'searchFilter';
        $this->ajax_pagination_admin->initialize($config);
        //get the posts data
        $this->data['shop_banner'] = $this->shop_banner_model->getRows(array('limit'=>$this->perPage));

        $this->render('admin/shop_banner/index');
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
        $totalRec = count($this->shop_banner_model->getRows($conditions));
        //pagination configuration
        $config['target']      = '#datatable';
        $config['base_url']    = base_url().'admin/shop_banner/ajaxData';
        $config['total_rows']  = $totalRec;
        $config['per_page']    = $this->perPage;
        $config['link_func']   = 'searchFilter';
        $this->ajax_pagination_admin->initialize($config);
        //set start and limit
        $conditions['start'] = $offset;
        $conditions['limit'] = $this->perPage;
        //get posts data
        $this->data['shop_banner'] = $this->shop_banner_model->getRows($conditions);
        //load the view
        $this->load->view('admin/shop_banner/ajax-data', $this->data, false);
    }

    public function create()
    {
        $this->data['page_title'] = '新增商品輪播圖';
        $this->render('admin/shop_banner/create');
    }

    public function insert()
    {
        if(empty($this->input->post('shop_banner_image'))){
            $image = 'no-image.jpg';
        } else {
            $image = $this->input->post('shop_banner_image');
        }
        $data = array(
            'shop_banner_name'               => $this->input->post('shop_banner_name'),
            'shop_banner_type'               => $this->input->post('shop_banner_type'),
            'shop_banner_on_the_shelf'       => $this->input->post('shop_banner_on_the_shelf'),
            'shop_banner_off_the_shelf'      => $this->input->post('shop_banner_off_the_shelf'),
            'shop_banner_image'              => $image,
            'shop_banner_link'               => check_link($this->input->post('shop_banner_link')),
            'shop_banner_sort'               => $this->input->post('shop_banner_sort'),
            'shop_banner_vertical_alignment' => $this->input->post('shop_banner_vertical_alignment'),
            'shop_banner_status'             => $this->input->post('shop_banner_status'),
            'creator_id'                     => $this->ion_auth->user()->row()->id,
            'created_at'                     => date('Y-m-d H:i:s'),
        );

        $this->db->insert('shop_banner', $data);
        $this->session->set_flashdata('message', '商品輪播圖建立成功！');
        redirect( base_url() . 'admin/shop_banner');
    }

    public function edit($id)
    {
        $this->data['page_title'] = '編輯商品輪播圖';
        $this->data['shop_banner'] = $this->mysql_model->_select('shop_banner','shop_banner_id',$id,'row');
        $this->render('admin/shop_banner/edit');
    }

    public function update($id)
    {
        if(empty($this->input->post('shop_banner_image'))){
            $image = 'no-image.jpg';
        } else {
            $image = $this->input->post('shop_banner_image');
        }
        $data = array(
            'shop_banner_name'               => $this->input->post('shop_banner_name'),
            'shop_banner_type'               => $this->input->post('shop_banner_type'),
            'shop_banner_on_the_shelf'       => $this->input->post('shop_banner_on_the_shelf'),
            'shop_banner_off_the_shelf'      => $this->input->post('shop_banner_off_the_shelf'),
            'shop_banner_image'              => $image,
            'shop_banner_link'               => check_link($this->input->post('shop_banner_link')),
            'shop_banner_sort'               => $this->input->post('shop_banner_sort'),
            'shop_banner_vertical_alignment' => $this->input->post('shop_banner_vertical_alignment'),
            'shop_banner_status'             => $this->input->post('shop_banner_status'),
            'updater_id'                     => $this->ion_auth->user()->row()->id,
            'updated_at'                     => date('Y-m-d H:i:s'),
        );

        $this->db->where('shop_banner_id', $id);
        $this->db->update('shop_banner', $data);
        $this->session->set_flashdata('message', '商品輪播圖編輯成功！');
        redirect($_SERVER['HTTP_REFERER']);
    }

    public function delete($id)
    {
        $this->db->where('shop_banner_id', $id);
        $this->db->delete('shop_banner');
        $this->session->set_flashdata('message', '商品輪播圖刪除成功！');
        redirect( base_url() . 'admin/shop_banner');
    }

    public function multiple_action()
    {
        if (!empty($this->input->post('shop_banner_id'))) {
            foreach ($this->input->post('shop_banner_id') as $shop_banner_id) {
                if($this->input->post('action')=='delete'){
                    $this->db->where('shop_banner_id', $shop_banner_id);
                    $this->db->delete('shop_banner');
                    $this->session->set_flashdata('message', '商品輪播圖刪除成功！');
                } elseif ($this->input->post('action')=='on_the_shelf') {
                    $data = array(
                        'shop_banner_status' => '1',
                    );
                    $this->db->where('shop_banner_id', $shop_banner_id);
                    $this->db->update('shop_banner', $data);
                    $this->session->set_flashdata('message', '商品輪播圖上架成功！');
                } elseif ($this->input->post('action')=='go_off_the_shelf') {
                    $data = array(
                        'shop_banner_status' => '2',
                    );
                    $this->db->where('shop_banner_id', $shop_banner_id);
                    $this->db->update('shop_banner', $data);
                    $this->session->set_flashdata('message', '商品輪播圖下架成功！');
                }
            }
        }
        redirect( base_url() . 'admin/shop_banner');
    }

}