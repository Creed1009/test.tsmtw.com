<?php defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * @property Mysql_model $mysql_model
 */

class Products extends Public_Controller {

    public function __construct()
    {
        parent::__construct();
    }

    public function index()
	{
		$this->data['page_title'] = '產品服務';
        $this->data['products'] = $this->mysql_model->_select('pages','page_url', 'product', 'row');

		$this->render('products');
	}
}