<?php defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * @property pages_model $pages_model
 * @property perPage $perPage
 * @property ajax_pagination_admin $ajax_pagination_admin
 * @property input $input
 * @property session $session
 * @property ion_auth $ion_auth
 * @property mysql_model $mysql_model
 * @property db $db
 * @property posts_model $posts_model
 */

class Posts extends Admin_Controller {

    public function __construct()
    {
        parent::__construct();
        $this->load->model('posts_model');
    }

    public function index()
    {
        $this->data['page_title'] = '公告欄';

        $data = array();
        //total rows count
        $totalRec = count($this->posts_model->getRows());
        //pagination configuration
        $config['target']      = '#datatable';
        $config['base_url']    = base_url().'admin/posts/ajaxData';
        $config['total_rows']  = $totalRec;
        $config['per_page']    = $this->perPage;
        $config['link_func']   = 'searchFilter';
        $this->ajax_pagination_admin->initialize($config);
        //get the posts data
        $this->data['category'] = $this->mysql_model->_select('post_category');
        $this->data['posts'] = $this->posts_model->getRows(array('limit'=>$this->perPage));

        $this->render('admin/posts/index');
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
        $totalRec = count($this->posts_model->getRows($conditions));
        //pagination configuration
        $config['target']      = '#datatable';
        $config['base_url']    = base_url().'admin/posts/ajaxData';
        $config['total_rows']  = $totalRec;
        $config['per_page']    = $this->perPage;
        $config['link_func']   = 'searchFilter';
        $this->ajax_pagination_admin->initialize($config);
        //set start and limit
        $conditions['start'] = $offset;
        $conditions['limit'] = $this->perPage;
        //get posts data
        $this->data['posts'] = $this->posts_model->getRows($conditions);
        //load the view
        $this->load->view('admin/posts/ajax-data', $this->data, false);
    }

    public function create()
    {
        $this->data['page_title'] = '新增公告欄';
        $this->data['category'] = $this->mysql_model->_select('post_category');
        $this->render('admin/posts/create');
    }

    public function insert()
    {
        $link = '';
        $str1 = $this->input->post('manufacturer_web');
        $str2 = 'http';
        if (false !== ($rst = strpos($str1, $str2))) {
            // echo 'find';
            $link .= $this->input->post('manufacturer_web');
        } else {
            // echo 'not find';
            $link .= 'http://'.$this->input->post('manufacturer_web');
        }
        $data = array(
            'post_category'      => $this->input->post('post_category'),
            'post_title'         => $this->input->post('post_title'),
            'post_content'       => $this->input->post('post_content'),
            'post_link1'         => check_link($this->input->post('post_link1')),
            'post_link2'         => check_link($this->input->post('post_link2')),
            'post_link3'         => check_link($this->input->post('post_link3')),
            'post_link4'         => check_link($this->input->post('post_link4')),
            'post_link5'         => check_link($this->input->post('post_link5')),
            'post_link_name1'    => $this->input->post('post_link_name1'),
            'post_link_name2'    => $this->input->post('post_link_name2'),
            'post_link_name3'    => $this->input->post('post_link_name3'),
            'post_link_name4'    => $this->input->post('post_link_name4'),
            'post_link_name5'    => $this->input->post('post_link_name5'),
            'post_file1'         => $this->input->post('post_file1'),
            'post_file2'         => $this->input->post('post_file2'),
            'post_file3'         => $this->input->post('post_file3'),
            'post_file4'         => $this->input->post('post_file4'),
            'post_file5'         => $this->input->post('post_file5'),
            'post_file_name1'    => $this->input->post('post_file_name1'),
            'post_file_name2'    => $this->input->post('post_file_name2'),
            'post_file_name3'    => $this->input->post('post_file_name3'),
            'post_file_name4'    => $this->input->post('post_file_name4'),
            'post_file_name5'    => $this->input->post('post_file_name5'),
            'post_topping'       => $this->input->post('post_topping'),
            'post_on_the_shelf'  => $this->input->post('post_on_the_shelf'),
            'post_off_the_shelf' => ($this->input->post('post_off_the_shelf') == '' ? '2099-12-31 23:59:59' : $this->input->post('post_off_the_shelf')),
            'creator_id'         => $this->ion_auth->user()->row()->id,
            'created_at'         => date('Y-m-d H:i:s'),
        );

        $this->mysql_model->_insert('posts',$data);

        $this->session->set_flashdata('message', '公告欄建立成功！');
        redirect( base_url() . 'admin/posts');
    }

    public function edit($id)
    {
        $this->data['page_title'] = '編輯公告欄';
        $this->data['category'] = $this->mysql_model->_select('post_category');
        $this->data['post'] = $this->mysql_model->_select('posts','post_id',$id,'row');
        $this->render('admin/posts/edit');
    }

    public function update($id)
    {
        $data = array(
            'post_category'      => $this->input->post('post_category'),
            'post_title'         => $this->input->post('post_title'),
            'post_content'       => $this->input->post('post_content'),
            'post_link1'         => check_link($this->input->post('post_link1')),
            'post_link2'         => check_link($this->input->post('post_link2')),
            'post_link3'         => check_link($this->input->post('post_link3')),
            'post_link4'         => check_link($this->input->post('post_link4')),
            'post_link5'         => check_link($this->input->post('post_link5')),
            'post_link_name1'    => $this->input->post('post_link_name1'),
            'post_link_name2'    => $this->input->post('post_link_name2'),
            'post_link_name3'    => $this->input->post('post_link_name3'),
            'post_link_name4'    => $this->input->post('post_link_name4'),
            'post_link_name5'    => $this->input->post('post_link_name5'),
            'post_file1'         => $this->input->post('post_file1'),
            'post_file2'         => $this->input->post('post_file2'),
            'post_file3'         => $this->input->post('post_file3'),
            'post_file4'         => $this->input->post('post_file4'),
            'post_file5'         => $this->input->post('post_file5'),
            'post_file_name1'    => $this->input->post('post_file_name1'),
            'post_file_name2'    => $this->input->post('post_file_name2'),
            'post_file_name3'    => $this->input->post('post_file_name3'),
            'post_file_name4'    => $this->input->post('post_file_name4'),
            'post_file_name5'    => $this->input->post('post_file_name5'),
            'post_topping'       => $this->input->post('post_topping'),
            'post_on_the_shelf'  => $this->input->post('post_on_the_shelf'),
            'post_off_the_shelf' => ($this->input->post('post_off_the_shelf') == '' ? '2099-12-31 23:59:59' : $this->input->post('post_off_the_shelf')),
            'updater_id'         => $this->ion_auth->user()->row()->id,
            'updated_at'         => date('Y-m-d H:i:s'),
        );

        $this->db->where('post_id', $id);
        $this->db->update('posts', $data);

        $this->session->set_flashdata('message', '公告欄更新成功！');
        redirect($_SERVER['HTTP_REFERER']);
    }

    // public function delete($id)
    // {
    //     $this->db->where('post_id', $id);
    //     $this->db->delete('posts');

    //     redirect( base_url() . 'admin/posts');
    // }

    public function multiple_action()
    {
        if (!empty($this->input->post('post_id'))) {
            foreach ($this->input->post('post_id') as $post_id) {
                if($this->input->post('action')=='delete'){
                    $this->db->where('post_id', $post_id);
                    $this->db->delete('posts');
                    $this->session->set_flashdata('message', '公告欄刪除成功！');
                }
            }
        }
        redirect( base_url() . 'admin/posts');
    }

    public function on_the_shelf($id)
    {
        $data = array(
            'post_status' => '1',
        );
        $this->db->where('post_id', $id);
        $this->db->update('posts', $data);
        $this->session->set_flashdata('message', '公告欄上架成功');
        redirect($_SERVER['HTTP_REFERER']);
    }

    public function go_off_the_shelf($id)
    {
        $data = array(
            'post_status' => '2',
        );
        $this->db->where('post_id', $id);
        $this->db->update('posts', $data);
        $this->session->set_flashdata('message', '公告欄下架成功');
        redirect($_SERVER['HTTP_REFERER']);
    }

    // 公告欄分類 ---------------------------------------------------------------------------------

    public function category()
    {
        $this->data['page_title'] = '公告欄分類';
        $this->data['category'] = $this->mysql_model->_select('post_category');

        $this->render('admin/posts/category/index');
    }

    public function insert_category()
    {
        $this->data['page_title'] = '新增公告欄分類';

        $data = array(
            'post_category_name'      => $this->input->post('post_category_name'),
            'post_category_name_en'   => $this->input->post('post_category_name_en'),
            'post_category_show_home' => $this->input->post('post_category_show_home'),
            'post_category_sort'      => $this->input->post('post_category_sort'),
            'creator_id'              => $this->ion_auth->user()->row()->id,
            'created_at'              => date('Y-m-d H:i:s'),
        );

        $this->db->insert('post_category', $data);
        redirect( base_url() . 'admin/posts/category');
    }

    public function edit_category($id)
    {
        $this->data['page_title'] = '編輯公告欄分類';
        $this->data['category'] = $this->mysql_model->_select('post_category','post_category_id',$id,'row');

        $this->render('admin/posts/category/edit');
    }

    public function update_category($id)
    {
        $data = array(
            'post_category_name'      => $this->input->post('post_category_name'),
            'post_category_name_en'   => $this->input->post('post_category_name_en'),
            'post_category_show_home' => $this->input->post('post_category_show_home'),
            'post_category_sort'      => $this->input->post('post_category_sort'),
            'updater_id'              => $this->ion_auth->user()->row()->id,
            'updated_at'              => date('Y-m-d H:i:s'),
        );
        $this->db->where('post_category_id', $id);
        $this->db->update('post_category', $data);

        redirect( base_url() . 'admin/posts/category');
    }

    public function delete_category($id)
    {
        $this->db->where('post_category_id', $id);
        $this->db->delete('post_category');

        redirect( base_url() . 'admin/posts/category');
    }

}