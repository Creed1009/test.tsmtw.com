<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Products_api extends CI_Controller {

    public function __construct() {
        parent::__construct();
        // 載入原本用的 Model
        $this->load->model('Products_model');
        // 全部回傳 JSON
        header('Content-Type: application/json; charset=utf-8');
    }

    /**
     * GET /api/products
     * 取得所有產品（可支援 page & keywords & category 等 query string）
     */
    public function index() {
        // 讀取 query string
        $page     = $this->input->get('page') ?: 1;
        $keywords = $this->input->get('keywords') ?: '';
        $category = $this->input->get('category') ?: '';

        $per_page = 10;
        $offset   = ($page - 1) * $per_page;

        // 傳入給 model
        $params = [
            'start'  => $offset,
            'limit'  => $per_page,
            'search' => [
                'keywords' => $keywords,
                'category' => $category
            ]
        ];
        $data = $this->Products_model->getRows($params);

        echo json_encode([
            'status'    => 'success',
            'page'      => (int)$page,
            'per_page'  => $per_page,
            'data'      => $data ?: []
        ], JSON_UNESCAPED_UNICODE);
        http_response_code(200);
    }

    /**
     * GET /api/products/{id}
     * 取得單一產品
     */
    public function show($id) {
        $product = $this->Products_model->getProductById($id);
        if ($product) {
            echo json_encode([
                'status' => 'success',
                'data'   => $product
            ], JSON_UNESCAPED_UNICODE);
            http_response_code(200);
        } else {
            echo json_encode([
                'status'  => 'fail',
                'message' => 'Product not found'
            ], JSON_UNESCAPED_UNICODE);
            http_response_code(404);
        }
    }

    /**
     * POST /api/products
     * 新增產品
     */
    public function store() {
        $input = json_decode(file_get_contents('php://input'), true);
        // 基本欄位驗證
        if (empty($input['product_title']) || empty($input['product_price'])) {
            echo json_encode([
                'status'  => 'fail',
                'message' => 'Title and price are required'
            ], JSON_UNESCAPED_UNICODE);
            http_response_code(400);
            return;
        }

        $ok = $this->Products_model->insert($input);
        if ($ok) {
            echo json_encode(['status' => 'success'], JSON_UNESCAPED_UNICODE);
            http_response_code(201);
        } else {
            echo json_encode([
                'status'  => 'fail',
                'message' => 'Insert failed'
            ], JSON_UNESCAPED_UNICODE);
            http_response_code(500);
        }
    }

    /**
     * PUT /api/products/{id}
     * 更新產品
     */
    public function update($id) {
        $input = json_decode(file_get_contents('php://input'), true);
        if (empty($input)) {
            echo json_encode([
                'status'  => 'fail',
                'message' => 'No data to update'
            ], JSON_UNESCAPED_UNICODE);
            http_response_code(400);
            return;
        }

        $ok = $this->Products_model->update($id, $input);
        if ($ok) {
            echo json_encode(['status' => 'success'], JSON_UNESCAPED_UNICODE);
            http_response_code(200);
        } else {
            echo json_encode([
                'status'  => 'fail',
                'message' => 'Update failed'
            ], JSON_UNESCAPED_UNICODE);
            http_response_code(500);
        }
    }

    /**
     * DELETE /api/products/{id}
     * 刪除產品
     */
    public function delete($id) {
        $ok = $this->Products_model->delete($id);
        if ($ok) {
            echo json_encode(['status' => 'success'], JSON_UNESCAPED_UNICODE);
            http_response_code(200);
        } else {
            echo json_encode([
                'status'  => 'fail',
                'message' => 'Delete failed'
            ], JSON_UNESCAPED_UNICODE);
            http_response_code(500);
        }
    }
}
