<?php defined('BASEPATH') OR exit('No direct script access allowed');


class Products extends Public_Controller {

    public function __construct()
    {
        parent::__construct();
        $this->load->model('products_model');
    }
    
    public function index()
	{
		$this->data['page_title'] = '產品服務';

        $per_page = 10;
        $current_page = $this->input->get('page') ? $this->input->get('page') : 1;

        $total_records = $this->products_model->getTotalRows();

        $this->data['total_pages'] = ceil($total_records / $per_page);

        $offset = ($current_page - 1) * $per_page;

        $this->data['products'] = $this->products_model->getRows($per_page, $offset);
        // $this->data['products'] = $this->products_model->getRows();
        $this->data['current_page'] = $current_page;
        // $this->data['products'] = $this->mysql_model->_select('pages','page_url', 'product', 'row');
        // $this->render('pages/products'); 
        $this->render('products/index'); 
	}

    // public function product($id)
    // {
    //     $this->data['page_title'] = '產品服務'; // set pag

    //     $this->data['product'] = $this->products_model->getRows($id);

    //     if (empty($this->data['product'])) {

    //         show_404();
    //     }

    //     $this->data['product_category'] = $this->products_model->getRows();
    //     $this->render('pages/product');
    // }

    public function view($id)
    {
        $this->data['page_title'] = '商品詳細資料'; // set pag

        // $this->data['product'] = $this->products_model->getRows($id);
        $this->data['products'] = $this->products_model->getProductById($id);

        // var_dump($this->data['products']);

        if (empty($this->data['products'])) {

            show_404();
        }

        // $this->data['product_category'] = $this->products_model->getRows();
        $this->data['product_category'] = $this->products_model->getCategoryByProductId($id);

        // $this->render('pages/products');
        $this->render('products/view'); 
    }    
}
