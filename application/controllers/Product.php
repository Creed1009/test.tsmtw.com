<?php defined('BASEPATH') OR exit('No direct script access allowed');

class product extends Public_Controller {

    public function __construct()
    {
        parent::__construct();
    }

    public function index()
	{
		$this->data['page_title'] = '產品服務';

		$this->render('product');
	}
}