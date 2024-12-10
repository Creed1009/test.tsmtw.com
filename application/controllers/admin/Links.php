<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Links extends Admin_Controller {

    public function __construct()
    {
        parent::__construct();
        $this->load->model('links_model');
    }

    public function index()
    {
        $this->data['page_title'] = '相關連結';

        $data = array();
        //total rows count
        $totalRec = count($this->links_model->getRows());
        //pagination configuration
        $config['target']      = '#datatable';
        $config['base_url']    = base_url().'admin/links/ajaxData';
        $config['total_rows']  = $totalRec;
        $config['per_page']    = $this->perPage;
        $config['link_func']   = 'searchFilter';
        $this->ajax_pagination_admin->initialize($config);
        //get the links data
        $this->data['category'] = $this->mysql_model->_select('link_category');
        $this->data['links'] = $this->links_model->getRows(array('limit'=>$this->perPage));

        $this->render('admin/links/index');
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
        $totalRec = count($this->links_model->getRows($conditions));
        //pagination configuration
        $config['target']      = '#datatable';
        $config['base_url']    = base_url().'admin/links/ajaxData';
        $config['total_rows']  = $totalRec;
        $config['per_page']    = $this->perPage;
        $config['link_func']   = 'searchFilter';
        $this->ajax_pagination_admin->initialize($config);
        //set start and limit
        $conditions['start'] = $offset;
        $conditions['limit'] = $this->perPage;
        //get links data
        $this->data['links'] = $this->links_model->getRows($conditions);
        //load the view
        $this->load->view('admin/links/ajax-data', $this->data, false);
    }

    public function create()
    {
        $this->data['page_title'] = '新增相關連結';
        $this->data['category'] = $this->mysql_model->_select('link_category');
        $this->render('admin/links/create');
    }

    public function insert()
    {
        $data = array(
            'link_category' => $this->input->post('link_category'),
            'link_title'    => $this->input->post('link_title'),
            'link_href'     => check_link($this->input->post('link_href')),
            'link_image'    => $this->input->post('link_image'),
            'creator_id'    => $this->ion_auth->user()->row()->id,
            'created_at'    => date('Y-m-d H:i:s'),
        );

        $this->mysql_model->_insert('links',$data);

        $this->session->set_flashdata('message', '相關連結建立成功！');
        redirect( base_url() . 'admin/links');
    }

    public function edit($id)
    {
        $this->data['page_title'] = '編輯相關連結';
        $this->data['category'] = $this->mysql_model->_select('link_category');
        $this->data['link'] = $this->mysql_model->_select('links','link_id',$id,'row');
        $this->render('admin/links/edit');
    }

    public function update($id)
    {
        $data = array(
            'link_category' => $this->input->post('link_category'),
            'link_title'    => $this->input->post('link_title'),
            'link_href'     => check_link($this->input->post('link_href')),
            'link_image'    => $this->input->post('link_image'),
            'updater_id'    => $this->ion_auth->user()->row()->id,
            'updated_at'    => date('Y-m-d H:i:s'),
        );

        $this->db->where('link_id', $id);
        $this->db->update('links', $data);

        $this->session->set_flashdata('message', '相關連結更新成功！');
        redirect($_SERVER['HTTP_REFERER']);
    }

    public function delete($id)
    {
        $this->db->where('link_id', $id);
        $this->db->delete('links');

        redirect( base_url() . 'admin/links');
    }

    public function multiple_action()
    {
        if (!empty($this->input->post('link_id'))) {
            foreach ($this->input->post('link_id') as $link_id) {
                if($this->input->post('action')=='delete'){
                    $this->db->where('link_id', $link_id);
                    $this->db->delete('links');
                    $this->session->set_flashdata('message', '相關連結刪除成功！');
                }
            }
        }
        redirect( base_url() . 'admin/links');
    }

    // 相關連結分類 ---------------------------------------------------------------------------------

    public function category()
    {
        $this->data['page_title'] = '相關連結分類';
        $this->data['category'] = $this->mysql_model->_select('link_category');

        $this->render('admin/links/category/index');
    }

    public function insert_category()
    {
        $this->data['page_title'] = '新增相關連結分類';

        $data = array(
            'link_category_name' => $this->input->post('link_category_name'),
            'creator_id'           => $this->ion_auth->user()->row()->id,
            'created_at'           => date('Y-m-d H:i:s'),
        );

        $this->db->insert('link_category', $data);
        redirect( base_url() . 'admin/links/category');
    }

    public function edit_category($id)
    {
        $this->data['page_title'] = '編輯相關連結分類';
        $this->data['category'] = $this->mysql_model->_select('link_category','link_category_id',$id,'row');

        $this->render('admin/links/category/edit');
    }

    public function update_category($id)
    {
        $data = array(
            'link_category_name' => $this->input->post('link_category_name'),
            'updater_id'           => $this->ion_auth->user()->row()->id,
            'updated_at'           => date('Y-m-d H:i:s'),
        );
        $this->db->where('link_category_id', $id);
        $this->db->update('link_category', $data);

        redirect( base_url() . 'admin/links/category');
    }

    public function delete_category($id)
    {
        $this->db->where('link_category_id', $id);
        $this->db->delete('link_category');

        redirect( base_url() . 'admin/links/category');
    }

}