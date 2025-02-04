<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Posts extends Public_Controller {

    public function __construct()
    {
        parent::__construct();
        $this->load->model('Posts_model');
    }

    public function index()
	{
		$this->data['page_title'] = '最新消息';

        $this->data['posts'] = $this->mysql_model->_select('posts');

		$this->render('posts/index');
    }

    public function view($id)
    {
        $this->data['page_title'] = '文章詳細內容';

        $this->data['post'] = $this->mysql_model->_select('posts', 'post_id', $id, 'row');

        if (empty($this->data['post'])) {

            show_404();
        }

        $this->data['post_category'] = $this->mysql_model->_select('post_category' );


        $this->render('posts/view');
    }

    public function filter() 
    {
        $category_id = $this->input->get('category');
    
        $this->load->model('Posts_model');
        $data['posts'] = $this->mysql_model->_select($category_id);
    
        $this->load->view('posts/post_list', $data); // 回傳過濾後的文章
    }
}