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

    public function filter() {
    $category_id = $this->input->get('category');
    
    
    if ($category_id === null || $category_id === '') {
        show_404();
    }
    
    $this->load->model('Products_model');
    $products = $this->Products_model->getProductsByCategory($category_id);
    
    if (empty($products)) {
        echo '<div class="text-center py-5">';
        echo '<p>🚫 此分類目前沒有商品</p>';
        echo '</div>';
    } else {
        echo '<div class="row">';
        foreach ($products as $product) {
            echo '<div class="col-6 col-md-4 col-lg-3 mb-4">';
            echo '<div class="card product-card">';
            echo '<img src="' . $product['product_image'] . '" class="card-img-top" alt="' . htmlspecialchars($product['product_name']) . '">';
            echo '<div class="card-body">';
            echo '<h5 class="card-title">' . htmlspecialchars($product['product_name']) . '</h5>';
            echo '<p class="card-text">' . substr(strip_tags($product['product_description']), 0, 100) . '...</p>';
            echo '<p class="price">NT$ ' . number_format($product['product_price']) . '</p>';
            echo '<a href="/products/view/' . $product['product_id'] . '" class="btn btn-primary">查看詳情</a>';
            echo '</div>';
            echo '</div>';
            echo '</div>';
        }
        echo '</div>';
        }
    }
}
