<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Downloads extends Admin_Controller {

    public function __construct()
    {
        parent::__construct();
        $this->load->model('downloads_model');
    }

    public function index()
    {
        $this->data['page_title'] = '檔案下載';

        $data = array();
        //total rows count
        $totalRec = count($this->downloads_model->getRows());
        //pagination configuration
        $config['target']      = '#datatable';
        $config['base_url']    = base_url().'admin/downloads/ajaxData';
        $config['total_rows']  = $totalRec;
        $config['per_page']    = $this->perPage;
        $config['link_func']   = 'searchFilter';
        $this->ajax_pagination_admin->initialize($config);
        //get the download data
        $this->data['category'] = $this->mysql_model->_select('download_category');
        $this->data['downloads'] = $this->downloads_model->getRows(array('limit'=>$this->perPage));

        $this->render('admin/downloads/index');
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
        $totalRec = count($this->downloads_model->getRows($conditions));
        //pagination configuration
        $config['target']      = '#datatable';
        $config['base_url']    = base_url().'admin/downloads/ajaxData';
        $config['total_rows']  = $totalRec;
        $config['per_page']    = $this->perPage;
        $config['link_func']   = 'searchFilter';
        $this->ajax_pagination_admin->initialize($config);
        //set start and limit
        $conditions['start'] = $offset;
        $conditions['limit'] = $this->perPage;
        //get download data
        $this->data['downloads'] = $this->downloads_model->getRows($conditions);
        //load the view
        $this->load->view('admin/downloads/ajax-data', $this->data, false);
    }

    public function create()
    {
        $this->data['page_title'] = '新增檔案下載';
        $this->data['category'] = $this->mysql_model->_select('download_category');
        $this->render('admin/downloads/create');
    }

    public function insert()
    {
        $data = array(
            'download_category' => $this->input->post('download_category'),
            'download_name'     => $this->input->post('download_name'),
            'download_link'     => $this->input->post('download_link'),
            'creator_id'        => $this->ion_auth->user()->row()->id,
            'created_at'        => date('Y-m-d H:i:s'),
        );

        $this->mysql_model->_insert('downloads',$data);

        $this->session->set_flashdata('message', '檔案下載建立成功！');
        redirect( base_url() . 'admin/downloads');
    }

    public function edit($id)
    {
        $this->data['page_title'] = '編輯檔案下載';
        $this->data['category'] = $this->mysql_model->_select('download_category');
        $this->data['downloads'] = $this->mysql_model->_select('downloads','download_id',$id,'row');
        $this->render('admin/downloads/edit');
    }

    public function update($id)
    {
        $data = array(
            'download_category' => $this->input->post('download_category'),
            'download_name'     => $this->input->post('download_name'),
            'download_link'     => $this->input->post('download_link'),
            'updater_id'        => $this->ion_auth->user()->row()->id,
            'updated_at'        => date('Y-m-d H:i:s'),
        );

        $this->db->where('download_id', $id);
        $this->db->update('downloads', $data);

        $this->session->set_flashdata('message', '檔案下載更新成功！');
        redirect($_SERVER['HTTP_REFERER']);
    }

    public function delete($id)
    {
        $this->db->where('download_id', $id);
        $this->db->delete('downloads');

        redirect( base_url() . 'admin/download');
    }

    public function multiple_action()
    {
        if (!empty($this->input->post('download_id'))) {
            foreach ($this->input->post('download_id') as $download_id) {
                if($this->input->post('action')=='delete'){
                    $this->db->where('download_id', $download_id);
                    $this->db->delete('downloads');
                    $this->session->set_flashdata('message', '檔案下載刪除成功！');
                }
            }
        }
        redirect( base_url() . 'admin/downloads');
    }

    // 檔案下載分類 ---------------------------------------------------------------------------------

    public function category()
    {
        $this->data['page_title'] = '檔案下載分類';
        $this->data['category'] = $this->mysql_model->_select('download_category');

        $this->render('admin/downloads/category/index');
    }

    public function insert_category()
    {
        $this->data['page_title'] = '新增檔案下載分類';

        $data = array(
            'download_category_name' => $this->input->post('download_category_name'),
            'creator_id'             => $this->ion_auth->user()->row()->id,
            'created_at'             => date('Y-m-d H:i:s'),
        );

        $this->db->insert('download_category', $data);
        redirect( base_url() . 'admin/downloads/category');
    }

    public function edit_category($id)
    {
        $this->data['page_title'] = '編輯檔案下載分類';
        $this->data['category'] = $this->mysql_model->_select('download_category','download_category_id',$id,'row');

        $this->render('admin/downloads/category/edit');
    }

    public function update_category($id)
    {
        $data = array(
            'download_category_name' => $this->input->post('download_category_name'),
            'updater_id'             => $this->ion_auth->user()->row()->id,
            'updated_at'             => date('Y-m-d H:i:s'),
        );
        $this->db->where('download_category_id', $id);
        $this->db->update('download_category', $data);

        redirect( base_url() . 'admin/downloads/category');
    }

    public function delete_category($id)
    {
        $this->db->where('download_category_id', $id);
        $this->db->delete('download_category');

        redirect( base_url() . 'admin/downloads/category');
    }

}