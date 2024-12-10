<?php defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * @property Posts_model $posts_model
 * @property Home_model $home_model
 * @property Manufacturers_model $manufacturers_model
 * @property Ajax_pagination $ajax_pagination
 * @property Input $input
 */

class Home extends Public_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('home_model');
		$this->load->model('posts_model');
		$this->load->model('manufacturers_model');
	}

	public function index()
	{
        $this->data['page_title'] = '首頁';
        // 添加调试代码
        if (!method_exists($this->posts_model, 'getPosts')) {
        log_message('error', 'Method getPosts does not exist in posts_model');
        }
        $data = array();
        //total rows count
        $totalRec = count($this->posts_model->getPosts());
        //pagination configuration
        $config['target']      = '#datatable';
        $config['base_url']    = base_url().'home/ajaxData';
        $config['total_rows']  = $totalRec;
        $config['per_page']    = 10;
        $config['link_func']   = 'searchPosts';
        $this->ajax_pagination->initialize($config);
        //get the posts data
        $this->data['banner'] = $this->home_model->GetBanner();
        $this->render('home/index');
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
        $category = $this->input->get('category');
        if(!empty($category)){
            $conditions['search']['category'] = $category;
        }
        //total rows count
        $totalRec = count($this->posts_model->getPosts($conditions));
        //pagination configuration
        $config['target']      = '#datatable';
        $config['base_url']    = base_url().'home/ajaxData';
        $config['total_rows']  = $totalRec;
        $config['per_page']    = 10;
        $config['link_func']   = 'searchPosts';
        $this->ajax_pagination->initialize($config);
        //set start and limit
        $conditions['start'] = $offset;
        $conditions['limit'] = 10;
        //get posts data
        $this->data['posts'] = $this->posts_model->getPosts($conditions);
        //load the view
        $this->load->view('home/ajax-data', $this->data, false);
    }
    

} 
