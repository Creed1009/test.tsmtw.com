<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Banner extends Admin_Controller {

    public function __construct()
    {
        parent::__construct();
        $this->load->model('banner_model');
    }

    public function index()
    {
        $this->data['page_title'] = 'Banner';

        $data = array();
        //total rows count
        $totalRec = count($this->banner_model->getRows());
        //pagination configuration
        $config['target']      = '#datatable';
        $config['base_url']    = base_url().'admin/banner/ajaxData';
        $config['total_rows']  = $totalRec;
        $config['per_page']    = $this->perPage;
        $config['link_func']   = 'searchFilter';
        $this->ajax_pagination_admin->initialize($config);
        //get the posts data
        $this->data['banner'] = $this->banner_model->getRows(array('limit'=>$this->perPage));

        $this->render('admin/banner/index');
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
        //set start and limit
        if(array_key_exists("start",$conditions)){
            $conditions['limit']['start'] = $conditions['start'];
            if(array_key_exists("limit",$conditions)){
                $conditions['limit']['limit'] = $conditions['limit'];
            }
        } else {
            $conditions['limit']['start'] = $offset;
            $conditions['limit']['limit'] = $this->perPage;
        }
        //get posts data
        $data = $this->banner_model->getRows($conditions);
        $data['page'] = $offset;
        $data['perPage'] = $this->perPage;
        echo json_encode($data);
    }

    public function insert()
    {
        $this->data['page_title'] = '新增Banner';
        $this->render('admin/banner/insert');
    }

}