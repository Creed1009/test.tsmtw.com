<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Posts extends Public_Controller {

    public function __construct()
    {
        parent::__construct();
    }

    public function index()
	{
		$this->data['page_title'] = '最新消息';

        $this->data['posts'] = $this->mysql_model->_select('posts');

		$this->render('posts');
    }

    public function view($id)
    {
        $this->data['page_title'] = '文章詳細內容';

        $this->data['post'] = $this->mysql_model->_select('posts', 'post_id', $id, 'row');

        if (empty($this->data['post'])) {

            show_404();
        }


        $this->render('posts_detail');
    }

}