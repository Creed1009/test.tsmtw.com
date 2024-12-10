<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Messages extends Admin_Controller {

    public function __construct()
    {
        parent::__construct();
        $this->load->model('messages_model');
        $this->load->model('ion_auth_model');
    }

    public function index()
    {
        $this->data['page_title'] = '訊息';

        $data = array();
        //total rows count
        $totalRec = count($this->messages_model->getRows());
        //pagination configuration
        $config['target']      = '#datatable';
        $config['base_url']    = base_url().'admin/messages/ajaxData';
        $config['total_rows']  = $totalRec;
        $config['per_page']    = $this->perPage;
        $config['link_func']   = 'searchFilter';
        $this->ajax_pagination_admin->initialize($config);
        //get the messages data
        $this->data['category'] = $this->mysql_model->_select('message_category');
        $this->data['messages'] = $this->messages_model->getRows(array('limit'=>$this->perPage));

        $this->render('admin/messages/index');
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
        $totalRec = count($this->messages_model->getRows($conditions));
        //pagination configuration
        $config['target']      = '#datatable';
        $config['base_url']    = base_url().'admin/messages/ajaxData';
        $config['total_rows']  = $totalRec;
        $config['per_page']    = $this->perPage;
        $config['link_func']   = 'searchFilter';
        $this->ajax_pagination_admin->initialize($config);
        //set start and limit
        $conditions['start'] = $offset;
        $conditions['limit'] = $this->perPage;
        //get messages data
        $this->data['messages'] = $this->messages_model->getRows($conditions);
        //load the view
        $this->load->view('admin/messages/ajax-data', $this->data, false);
    }

    public function create()
    {
        $this->data['page_title'] = '新增訊息';
        $this->data['category'] = $this->mysql_model->_select('message_category');
        $this->data['schools'] = $this->mysql_model->_select('schools');
        $this->data['users'] = $this->ion_auth_model->getUsers();
        $this->render('admin/messages/create');
    }

    public function insert()
    {
        $data = array(
            'message_category' => $this->input->post('message_category'),
            'message_school'   => $this->input->post('message_school'),
            'message_date'     => $this->input->post('message_date'),
            'message_title'    => $this->input->post('message_title'),
            'message_content'  => $this->input->post('message_content'),
            'message_from'     => $this->ion_auth->user()->row()->id,
            'message_to'       => $this->input->post('message_to'),
            'creator_id'       => $this->ion_auth->user()->row()->id,
            'created_at'       => date('Y-m-d H:i:s'),
        );

        $this->mysql_model->_insert('messages',$data);

        $this->session->set_flashdata('message', '訊息建立成功！');
        redirect( base_url() . 'admin/messages');
    }

    public function edit($id)
    {
        $this->data['page_title'] = '編輯訊息';
        $this->data['category'] = $this->mysql_model->_select('message_category');
        $this->data['schools'] = $this->mysql_model->_select('schools');
        $this->data['users'] = $this->ion_auth_model->getUsers();
        $this->data['message'] = $this->mysql_model->_select('messages','message_id',$id,'row');
        $this->render('admin/messages/edit');
    }

    public function update($id)
    {
        $data = array(
            'message_category' => $this->input->post('message_category'),
            'message_school'   => $this->input->post('message_school'),
            'message_date'     => $this->input->post('message_date'),
            'message_title'    => $this->input->post('message_title'),
            'message_content'  => $this->input->post('message_content'),
            'message_to'       => $this->input->post('message_to'),
            'updater_id'       => $this->ion_auth->user()->row()->id,
            'updated_at'       => date('Y-m-d H:i:s'),
        );

        $this->db->where('message_id', $id);
        $this->db->update('messages', $data);

        $this->session->set_flashdata('message', '訊息更新成功！');
        redirect($_SERVER['HTTP_REFERER']);
    }

    public function void($id)
    {
        $data = array(
            'message_status' => 0,
            'updater_id'     => $this->ion_auth->user()->row()->id,
            'updated_at'     => date('Y-m-d H:i:s'),
        );

        $this->db->where('message_id', $id);
        $this->db->update('messages', $data);

        $this->session->set_flashdata('message', '訊息收回成功！');
        redirect($_SERVER['HTTP_REFERER']);
    }

    public function delete($id)
    {
        $this->db->where('message_id', $id);
        $this->db->delete('messages');

        redirect( base_url() . 'admin/messages');
    }

    public function multiple_action()
    {
        if (!empty($this->input->post('message_id'))) {
            foreach ($this->input->post('message_id') as $message_id) {
                if($this->input->post('action')=='delete'){
                    $this->db->where('message_id', $message_id);
                    $this->db->delete('messages');
                    $this->session->set_flashdata('message', '訊息刪除成功！');
                }
            }
        }
        redirect( base_url() . 'admin/messages');
    }

    // 訊息分類 ---------------------------------------------------------------------------------

    public function category()
    {
        $this->data['page_title'] = '訊息分類';
        $this->data['category'] = $this->mysql_model->_select('message_category');

        $this->render('admin/messages/category/index');
    }

    public function insert_category()
    {
        $this->data['page_title'] = '新增訊息分類';

        $data = array(
            'message_category_name' => $this->input->post('message_category_name'),
            'creator_id'            => $this->ion_auth->user()->row()->id,
            'created_at'            => date('Y-m-d H:i:s'),
        );

        $this->db->insert('message_category', $data);
        redirect( base_url() . 'admin/messages/category');
    }

    public function edit_category($id)
    {
        $this->data['page_title'] = '編輯訊息分類';
        $this->data['category'] = $this->mysql_model->_select('message_category','message_category_id',$id,'row');

        $this->render('admin/messages/category/edit');
    }

    public function update_category($id)
    {
        $data = array(
            'message_category_name' => $this->input->post('message_category_name'),
            'updater_id'            => $this->ion_auth->user()->row()->id,
            'updated_at'            => date('Y-m-d H:i:s'),
        );
        $this->db->where('message_category_id', $id);
        $this->db->update('message_category', $data);

        redirect( base_url() . 'admin/messages/category');
    }

    public function delete_category($id)
    {
        $this->db->where('message_category_id', $id);
        $this->db->delete('message_category');

        redirect( base_url() . 'admin/messages/category');
    }

}