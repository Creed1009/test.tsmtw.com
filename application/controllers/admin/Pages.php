<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Pages extends Admin_Controller {

    public function __construct()
    {
        parent::__construct();
        $this->load->model('pages_model');
    }

    public function index()
    {
        $this->data['page_title'] = '頁面';

        $data = array();
        //total rows count
        $totalRec = count($this->pages_model->getRows());
        //pagination configuration
        $config['target']      = '#datatable';
        $config['base_url']    = base_url().'admin/page/ajaxData';
        $config['total_rows']  = $totalRec;
        $config['per_page']    = $this->perPage;
        $config['link_func']   = 'searchFilter';
        $this->ajax_pagination_admin->initialize($config);
        //get the posts data
        $this->data['page'] = $this->pages_model->getRows(array('limit'=>$this->perPage));

        $this->render('admin/pages/index');
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
        $totalRec = count($this->pages_model->getRows($conditions));
        //pagination configuration
        $config['target']      = '#datatable';
        $config['base_url']    = base_url().'admin/page/ajaxData';
        $config['total_rows']  = $totalRec;
        $config['per_page']    = $this->perPage;
        $config['link_func']   = 'searchFilter';
        $this->ajax_pagination_admin->initialize($config);
        //set start and limit
        $conditions['start'] = $offset;
        $conditions['limit'] = $this->perPage;
        //get posts data
        $this->data['page'] = $this->pages_model->getRows($conditions);
        //load the view
        $this->load->view('admin/page/ajax-data', $this->data, false);
    }

    public function create()
    {
        $this->data['page_title'] = '新增頁面';
        $this->render('admin/pages/create');
    }

    public function insert()
    {
        $data = array(
            'page_name'      => $this->input->post('page_name'),
            'page_name_en'   => $this->input->post('page_name_en'),
            'page_url'       => $this->input->post('page_url'),
            'page_content'   => $this->input->post('page_content'),
            'page_banner'    => $this->input->post('page_banner'),
            'page_to_menu'   => $this->input->post('page_to_menu'),
            'page_menu_sort' => $this->input->post('page_menu_sort'),
            'creator_id'     => $this->ion_auth->user()->row()->id,
            'created_at'     => date('Y-m-d H:i:s'),
        );

        $this->db->insert('pages', $data);
        $this->session->set_flashdata('message', '頁面新增成功！');
        redirect('admin/pages');
    }

    public function edit($id)
    {
        $this->data['page'] = $this->mysql_model->_select('pages','page_id',$id,'row');
        $this->data['page_title'] = $this->data['page']['page_name'];
        $this->render('admin/pages/edit');
    }

    public function update($id)
    {
        $data = array(
            'page_name'      => $this->input->post('page_name'),
            'page_name_en'   => $this->input->post('page_name_en'),
            'page_url'       => $this->input->post('page_url'),
            'page_content'   => $this->input->post('page_content'),
            'page_banner'    => $this->input->post('page_banner'),
            'page_to_menu'   => $this->input->post('page_to_menu'),
            'page_menu_sort' => $this->input->post('page_menu_sort'),
            'updater_id'     => $this->ion_auth->user()->row()->id,
            'updated_at'     => date('Y-m-d H:i:s'),
        );

        $this->db->where('page_url', $this->input->post('page_url'));
        $this->db->update('pages', $data);
        $this->session->set_flashdata('message', '頁面編輯成功！');
        redirect($_SERVER['HTTP_REFERER']);
    }

    public function delete($id)
    {
        $this->db->where('page_id', $id);
        $this->db->delete('pages');

        $this->session->set_flashdata('message', '頁面刪除成功！');
        redirect( base_url() . 'admin/pages');
    }

}