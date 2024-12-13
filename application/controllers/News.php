<?php defined('BASEPATH') OR exit('No direct script access allowed');

class News extends Public_Controller {

    public function __construct()
    {
        parent::__construct();
    }

    public function index()
	{
		$this->data['page_title'] = '最新消息';

        $this->data['posts'] = $this->mysql_model->_select('posts');

		$this->render('news');
    }
}