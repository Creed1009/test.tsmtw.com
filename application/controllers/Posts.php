<?php defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * @property Posts_model $Posts_model
 */

class Posts extends Public_Controller {

    public function __construct()
    {
        parent::__construct();
        $this->load->model('Posts_model');
    }

    public function index()
	{
		$this->data['page_title'] = '最新消息';

        // $this->data['posts'] = $this->mysql_model->_select('posts');
        $this->data['posts'] = $this->Posts_model->getRows(array(
            'search' => array(
                'status' => 1, 
            ),
            'sortBy' => 'post_id',
        ));
        // $this->data['posts'] = $this->Posts_model->getPostsByCategory($this->input->get('category'));

		$this->render('posts/index');
    }

    public function view($id)
    {
        $this->data['page_title'] = '文章詳細內容'; // set pag

        $this->data['post'] = $this->mysql_model->_select('posts', 'post_id', $id, 'row');

        if (empty($this->data['post'])) {

            show_404();
        }

        $this->data['post_category'] = $this->mysql_model->_select('post_category' );

        $this->render('posts/view');
    }

    public function filter() {
        $category_id = $this->input->get('category'); // 取得分類 ID
        if (!$category_id) {
            show_404();
        }

        $this->load->model('Posts_model');
        $data['posts'] = $this->Posts_model->getPostsByCategory($category_id);

        if (empty($data['posts'])) {
            echo "<p>🚫 沒有符合的文章</p>";
        } else {
            foreach ($data['posts'] as $post) {
                echo "<article class='mb-4'>";
                echo "<h2>" . $post['post_title'] . "</h2>";
                echo "<p>" . substr(strip_tags($post['post_content']), 0, 300) . "...</p>";
                echo "<a href='/posts/view/" . $post['post_id'] . "' class='btn btn-primary'>Read More</a>";
                echo "<hr></article>";
            }
        }
    }
}
