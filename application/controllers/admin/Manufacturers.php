<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Manufacturers extends Admin_Controller {

    public function __construct()
    {
        parent::__construct();
        $this->load->model('manufacturers_model');
    }

    public function index()
    {
        $this->data['page_title'] = '廠商';

        $data = array();
        //total rows count
        $totalRec = count($this->manufacturers_model->getRows());
        //pagination configuration
        $config['target']      = '#datatable';
        $config['base_url']    = base_url().'admin/manufacturers/ajaxData';
        $config['total_rows']  = $totalRec;
        $config['per_page']    = $this->perPage;
        $config['link_func']   = 'searchFilter';
        $this->ajax_pagination_admin->initialize($config);
        //get the manufacturer data
        $this->data['manufacturers'] = $this->manufacturers_model->getRows(array('limit'=>$this->perPage));

        $this->render('admin/manufacturers/index');
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
        $category = $this->input->get('category');
        // $status = $this->input->get('status');
        if(!empty($keywords)){
            $conditions['search']['keywords'] = $keywords;
        }
        if(!empty($sortBy)){
            $conditions['search']['sortBy'] = $sortBy;
        }
        if(!empty($category)){
            $conditions['search']['category'] = $category;
        }
        // if(!empty($status)){
        //     $conditions['search']['status'] = $status;
        // }
        //total rows count
        $totalRec = count($this->manufacturers_model->getRows($conditions));
        //pagination configuration
        $config['target']      = '#datatable';
        $config['base_url']    = base_url().'admin/manufacturers/ajaxData';
        $config['total_rows']  = $totalRec;
        $config['per_page']    = $this->perPage;
        $config['link_func']   = 'searchFilter';
        $this->ajax_pagination_admin->initialize($config);
        //set start and limit
        $conditions['start'] = $offset;
        $conditions['limit'] = $this->perPage;
        //get manufacturer data
        $this->data['manufacturers'] = $this->manufacturers_model->getRows($conditions);
        //load the view
        $this->load->view('admin/manufacturer/ajax-data', $this->data, false);
    }

    public function create()
    {
        $this->data['page_title'] = '新增廠商';
        $this->render('admin/manufacturers/create');
    }

    public function insert()
    {
        $data = array(
            'manufacturer_name'  => $this->input->post('manufacturer_name'),
            'manufacturer_web'   => check_link($this->input->post('manufacturer_web')),
            'manufacturer_image' => $this->input->post('manufacturer_image'),
            'manufacturer_sort'  => $this->input->post('manufacturer_sort'),
            'creator_id'         => $this->ion_auth->user()->row()->id,
            'created_at'         => date('Y-m-d H:i:s'),
        );

        $this->mysql_model->_insert('manufacturers',$data);

        $this->session->set_flashdata('message', '廠商建立成功！');
        redirect( base_url() . 'admin/manufacturers');
    }

    public function edit($id)
    {
        $this->data['page_title'] = '編輯廠商';
        $this->data['manufacturer'] = $this->mysql_model->_select('manufacturers','manufacturer_id',$id,'row');
        $this->render('admin/manufacturers/edit');
    }

    public function update($id)
    {
        $data = array(
            'manufacturer_name'  => $this->input->post('manufacturer_name'),
            'manufacturer_web'   => check_link($this->input->post('manufacturer_web')),
            'manufacturer_image' => $this->input->post('manufacturer_image'),
            'manufacturer_sort'  => $this->input->post('manufacturer_sort'),
            'updater_id'         => $this->ion_auth->user()->row()->id,
            'updated_at'         => date('Y-m-d H:i:s'),
        );

        $this->db->where('manufacturer_id', $id);
        $this->db->update('manufacturers', $data);

        $this->session->set_flashdata('message', '廠商更新成功！');
        redirect($_SERVER['HTTP_REFERER']);
    }

    public function delete($id)
    {
        $this->db->where('manufacturer_id', $id);
        $this->db->delete('manufacturers');

        redirect( base_url() . 'admin/manufacturers');
    }

    public function multiple_action()
    {
        if (!empty($this->input->post('manufacturer_id'))) {
            foreach ($this->input->post('manufacturer_id') as $manufacturer_id) {
                if($this->input->post('action')=='delete'){
                    $this->db->where('manufacturer_id', $manufacturer_id);
                    $this->db->delete('manufacturers');
                    $this->session->set_flashdata('message', '廠商刪除成功！');
                }
            }
        }
        redirect( base_url() . 'admin/manufacturers');
    }

}