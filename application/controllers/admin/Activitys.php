<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Activitys extends Admin_Controller {

    public function __construct()
    {
        parent::__construct();
        $this->load->model('activitys_model');
    }

    public function index()
    {
        $this->data['page_title'] = '活動照片';

        $data = array();
        //total rows count
        $totalRec = count($this->activitys_model->getRows());
        //pagination configuration
        $config['target']      = '#datatable';
        $config['base_url']    = base_url().'admin/activitys/ajaxData';
        $config['total_rows']  = $totalRec;
        $config['per_page']    = $this->perPage;
        $config['link_func']   = 'searchFilter';
        $this->ajax_pagination_admin->initialize($config);
        //get the activitys data
        $this->data['activitys'] = $this->activitys_model->getRows(array('limit'=>$this->perPage));

        $this->render('admin/activitys/index');
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
        $totalRec = count($this->activitys_model->getRows($conditions));
        //pagination configuration
        $config['target']      = '#datatable';
        $config['base_url']    = base_url().'admin/activitys/ajaxData';
        $config['total_rows']  = $totalRec;
        $config['per_page']    = $this->perPage;
        $config['link_func']   = 'searchFilter';
        $this->ajax_pagination_admin->initialize($config);
        //set start and limit
        $conditions['start'] = $offset;
        $conditions['limit'] = $this->perPage;
        //get activitys data
        $this->data['activitys'] = $this->activitys_model->getRows($conditions);
        //load the view
        $this->load->view('admin/activitys/ajax-data', $this->data, false);
    }

    public function create()
    {
        $this->data['page_title'] = '新增活動照片';
        $this->data['category'] = $this->mysql_model->_select('activity_category');
        $this->render('admin/activitys/create');
    }

    public function insert()
    {
        $data = array(
            'activity_name'  => $this->input->post('activity_name'),
            'activity_image' => $this->input->post('activity_image'),
            'creator_id'     => $this->ion_auth->user()->row()->id,
            'created_at'     => date('Y-m-d H:i:s'),
        );
        $activity_id = $this->mysql_model->_insert('activitys',$data);

        //
        $count                     = count($this->input->post('activity_item_image'));
        $activity_item_image       = $this->input->post('activity_item_image');
        $activity_item_description = $this->input->post('activity_item_description');
        for($i = 0; $i < $count; $i++){
            if(!empty($activity_item_image[$i])){
                $data = array(
                    'activity_id'               => $activity_id,
                    'activity_item_image'       => $activity_item_image[$i],
                    'activity_item_description' => $activity_item_description[$i],
                    'creator_id'                => $this->ion_auth->user()->row()->id,
                    'created_at'                => date('Y-m-d H:i:s'),
                );
                $this->db->insert('activity_item', $data);
            }
        }

        $this->session->set_flashdata('message', '活動照片建立成功！');
        redirect( base_url() . 'admin/activitys');
    }

    public function edit($id)
    {
        $this->data['page_title'] = '編輯活動照片';
        $this->data['category'] = $this->mysql_model->_select('activity_category');
        $this->data['activity'] = $this->mysql_model->_select('activitys','activity_id',$id,'row');
        $this->data['activity_item'] = $this->mysql_model->_select('activity_item','activity_id',$id);
        $this->render('admin/activitys/edit');
    }

    public function update($id)
    {
        $data = array(
            'activity_name'  => $this->input->post('activity_name'),
            'activity_image' => $this->input->post('activity_image'),
            'updater_id'     => $this->ion_auth->user()->row()->id,
            'updated_at'     => date('Y-m-d H:i:s'),
        );

        $this->db->where('activity_id', $id);
        $this->db->update('activitys', $data);

        $this->db->where('activity_id', $id);
        $this->db->delete('activity_item');
        //
        $count                     = count($this->input->post('activity_item_image'));
        $activity_item_image       = $this->input->post('activity_item_image');
        $activity_item_description = $this->input->post('activity_item_description');
        for($i = 0; $i < $count; $i++){
            if(!empty($activity_item_image[$i])){
                $data = array(
                    'activity_id'               => $id,
                    'activity_item_image'       => $activity_item_image[$i],
                    'activity_item_description' => $activity_item_description[$i],
                    'creator_id'                => $this->ion_auth->user()->row()->id,
                    'created_at'                => date('Y-m-d H:i:s'),
                );
                $this->db->insert('activity_item', $data);
            }
        }

        $this->session->set_flashdata('message', '活動照片更新成功！');
        redirect($_SERVER['HTTP_REFERER']);
    }

    public function delete($id)
    {
        $this->db->where('activity_id', $id);
        $this->db->delete('activitys');

        $this->db->where('activity_id', $id);
        $this->db->delete('activity_item');

        redirect( base_url() . 'admin/activitys');
    }

    public function multiple_action()
    {
        if (!empty($this->input->post('activity_id'))) {
            foreach ($this->input->post('activity_id') as $activity_id) {
                if($this->input->post('action')=='delete'){
                    $this->db->where('activity_id', $activity_id);
                    $this->db->delete('activitys');
                    $this->db->where('activity_id', $activity_id);
                    $this->db->delete('activity_item');
                    $this->session->set_flashdata('message', '活動照片刪除成功！');
                }
            }
        }
        redirect( base_url() . 'admin/activitys');
    }

    // 活動照片分類 ---------------------------------------------------------------------------------

    public function category()
    {
        $this->data['page_title'] = '活動照片分類';
        $this->data['category'] = $this->mysql_model->_select('activity_category');

        $this->render('admin/activitys/category/index');
    }

    public function insert_category()
    {
        $this->data['page_title'] = '新增活動照片分類';

        $data = array(
            'activity_category_name' => $this->input->post('activity_category_name'),
            'creator_id'             => $this->ion_auth->user()->row()->id,
            'created_at'             => date('Y-m-d H:i:s'),
        );

        $this->db->insert('activity_category', $data);
        redirect( base_url() . 'admin/activitys/category');
    }

    public function edit_category($id)
    {
        $this->data['page_title'] = '編輯活動照片分類';
        $this->data['category'] = $this->mysql_model->_select('activity_category','activity_category_id',$id,'row');

        $this->render('admin/activitys/category/edit');
    }

    public function update_category($id)
    {
        $data = array(
            'activity_category_name' => $this->input->post('activity_category_name'),
            'updater_id'             => $this->ion_auth->user()->row()->id,
            'updated_at'             => date('Y-m-d H:i:s'),
        );
        $this->db->where('activity_category_id', $id);
        $this->db->update('activity_category', $data);

        redirect( base_url() . 'admin/activitys/category');
    }

    public function delete_category($id)
    {
        $this->db->where('activity_category_id', $id);
        $this->db->delete('activity_category');

        redirect( base_url() . 'admin/activitys/category');
    }

}