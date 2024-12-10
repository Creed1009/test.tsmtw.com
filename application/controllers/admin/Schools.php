<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Schools extends Admin_Controller {

    public function __construct()
    {
        parent::__construct();
        $this->load->model('schools_model');
    }

    public function index()
    {
        $this->data['page_title'] = '學校';

        $data = array();
        //total rows count
        $totalRec = count($this->schools_model->getRows());
        //pagination configuration
        $config['target']      = '#datatable';
        $config['base_url']    = base_url().'admin/schools/ajaxData';
        $config['total_rows']  = $totalRec;
        $config['per_page']    = $this->perPage;
        $config['link_func']   = 'searchFilter';
        $this->ajax_pagination_admin->initialize($config);
        //get the schools data
        $this->data['schools'] = $this->schools_model->getRows(array('limit'=>$this->perPage));

        $this->render('admin/schools/index');
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
        $totalRec = count($this->schools_model->getRows($conditions));
        //pagination configuration
        $config['target']      = '#datatable';
        $config['base_url']    = base_url().'admin/schools/ajaxData';
        $config['total_rows']  = $totalRec;
        $config['per_page']    = $this->perPage;
        $config['link_func']   = 'searchFilter';
        $this->ajax_pagination_admin->initialize($config);
        //set start and limit
        $conditions['start'] = $offset;
        $conditions['limit'] = $this->perPage;
        //get schools data
        $this->data['schools'] = $this->schools_model->getRows($conditions);
        //load the view
        $this->load->view('admin/schools/ajax-data', $this->data, false);
    }

    public function create()
    {
        $this->data['page_title'] = '新增學校';
        $this->render('admin/schools/create');
    }

    public function insert()
    {
        $data = array(
            'school_code'    => $this->input->post('school_code'),
            'school_name'    => $this->input->post('school_name'),
            'school_address' => $this->input->post('school_address'),
            'school_phone'   => $this->input->post('school_phone'),
            'school_site'    => $this->input->post('school_site'),
            'creator_id'     => $this->ion_auth->user()->row()->id,
            'created_at'     => date('Y-m-d H:i:s'),
        );

        $this->mysql_model->_insert('schools',$data);

        $this->session->set_flashdata('message', '學校建立成功！');
        redirect( base_url() . 'admin/schools');
    }

    public function edit($id)
    {
        $this->data['page_title'] = '編輯學校';
        $this->data['school'] = $this->mysql_model->_select('schools','school_id',$id,'row');
        $this->render('admin/schools/edit');
    }

    public function update($id)
    {
        $data = array(
            'school_code'    => $this->input->post('school_code'),
            'school_name'    => $this->input->post('school_name'),
            'school_address' => $this->input->post('school_address'),
            'school_phone'   => $this->input->post('school_phone'),
            'school_site'    => $this->input->post('school_site'),
            'updater_id'     => $this->ion_auth->user()->row()->id,
            'updated_at'     => date('Y-m-d H:i:s'),
        );

        $this->db->where('school_id', $id);
        $this->db->update('schools', $data);

        $this->session->set_flashdata('message', '學校更新成功！');
        redirect($_SERVER['HTTP_REFERER']);
    }

    public function delete($id)
    {
        $this->db->where('school_id', $id);
        $this->db->delete('schools');

        redirect( base_url() . 'admin/schools');
    }

    public function multiple_action()
    {
        if (!empty($this->input->post('school_id'))) {
            foreach ($this->input->post('school_id') as $school_id) {
                if($this->input->post('action')=='delete'){
                    $this->db->where('school_id', $school_id);
                    $this->db->delete('schools');
                    $this->session->set_flashdata('message', '學校刪除成功！');
                }
            }
        }
        redirect( base_url() . 'admin/schools');
    }

}