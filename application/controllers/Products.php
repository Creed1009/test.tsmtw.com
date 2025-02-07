<?php defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * @property data $data
 * @property view $view
 */

class Products extends Public_Controller {

    public function __construct()
    {
        parent::__construct();
        $this->load->model('products_model');
    }
    
    public function index()
	{
		$this->data['page_title'] = '產品服務';
        $this->data['products'] = $this->products_model->getRows();
        // $this->data['products'] = $this->mysql_model->_select('pages','page_url', 'product', 'row');
        $this->render('pages/products'); 
	}

    public function product($id)
    {
        $this->data['page_title'] = '產品服務'; // set pag

        $this->data['product'] = $this->products_model->getRows($id);

        if (empty($this->data['product'])) {

            show_404();
        }

        $this->data['product_category'] = $this->products_model->getRows();
        $this->render('pages/product');
    }

    
}
