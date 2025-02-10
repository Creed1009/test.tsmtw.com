<?php defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * @property Mysql_model $mysql_model
 */

class About extends Public_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->data['page_title'] = '關於我們';
		$this->load->model('mysql_model');
	}

	public function index()
	{
		$this->data['page_title'] = '關於我們';
		$this->data['banner'] = $this->mysql_model->_select('pages','page_url', 'about', 'row');
		$this->data['about_contact'] = $this->mysql_model->_select('pages','page_url', 'about_contact', 'row');
		// $this->data['about_contact'] = $this->mysql_model->_select('pages','page_url', 'about_contact', 'row');
		$this->render('pages/about');
		// $this->load->view('about', $this->data);
	}

	function a()
	{
		echo 'a';
		$this->b();
	}

	function b()
	{
		echo 'b';
		$this->c();
	}

	function c()
	{
		echo 'c';
	}


}