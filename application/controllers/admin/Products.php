<?php defined('BASEPATH') OR exit('No direct script access allowed');


class Products extends Admin_Controller {

    public function __construct()
    {
        parent::__construct();
        $this->load->model('products_model');
    }

    public function index()
    {
        $this->data['page_title'] = '商品';

        $data = array();
        //total rows count
        $totalRec = count($this->products_model->getRows());
        //pagination configuration
        $config['target']      = '#datatable';
        $config['base_url']    = base_url().'admin/products/ajaxData';
        $config['total_rows']  = $totalRec;
        $config['per_page']    = $this->perPage;
        $config['link_func']   = 'searchFilter';
        $this->ajax_pagination_admin->initialize($config);
        //get the products data
        $this->data['category'] = $this->mysql_model->_select('product_category');
        $this->data['products'] = $this->products_model->getRows(array('limit'=>$this->perPage));

        $this->render('admin/products/index');
    }

    function ajaxData()
    {
        $conditions = array();
        //calc offset number
        $page = $this->input->post('page');
        if(!$page){
            $offset = 0;
        } else {
            $offset = $page;
        }
        //set conditions for search
        $keywords = $this->input->get('keywords');
        $sortBy = $this->input->get('sortBy');
        $category = $this->input->get('category');
        // $status = $this->input->get('status');
        if(!empty($keywords)){ 
            $conditions['search']['keywords'] = $keywords;
        }
        if(!empty($sortBy)){
            $conditions['search']['sortBy'] = $sortBy;
        }
        if(!empty($category)){
            $conditions['search']['category'] = $category;
        }
        // if(!empty($status)){
        //     $conditions['search']['status'] = $status;
        // }

        //total rows count
        $totalRec = $this->products_model->getRowsCount($conditions);

        // $result = $this->products_model->getRows($conditions);
        // $totalRec = is_array($result) ? count($result) : 0;

        //pagination configuration
        $config['target']      = '#datatable';
        $config['base_url']    = base_url().'admin/products/ajaxData';
        $config['total_rows']  = $totalRec;
        $config['per_page']    = $this->perPage;
        $config['link_func']   = 'searchFilter';
        $this->ajax_pagination_admin->initialize($config);
        //set start and limit
        $conditions['start'] = $offset;
        $conditions['limit'] = $this->perPage;
        //get products data
        $this->data['products'] = $this->products_model->getRows($conditions);
        //load the view
        $this->load->view('admin/products/ajax-data', $this->data, false);
    }

    public function create()
    {
        $this->data['page_title'] = '新增商品';
        $this->data['category'] = $this->mysql_model->_select('product_category');

        if ($this->input->post()) {
            $data = array(
                'product_title'  => $this->input->post('product_title'),
                'product_category' => implode(',', $this->input->post('product_category')),
                'product_content' => $this->input->post('product_content'),
                'product_sort' => $this->input->post('product_sort'),
                // 'product_title_en'  => $this->input->post('product_title_en'),
                'product_description'  => $this->input->post('product_description'),
                // 'product_description_en'  => $this->input->post('product_description_en'),
                'product_price' => $this->input->post('product_price'),
                'creator_id'   => $this->session->userdata('user_id'),
                'created_at'   => date('Y-m-d H:i:s'),
            );

            $insert_id = $this->mysql_model->_insert('products', $data);

            if ($insert_id) {
                $this->session->set_flashdata('message', '商品建立成功！');
                redirect('admin/products');
            } else {
                $this->session->set_flashdata('error', '商品建立失敗！');
            }
        }

        $this->render('admin/products/create');
    }

    public function insert()
    {
        $data = array(
            'product_title'  => $this->input->post('product_title'),
            'product_category' => implode(',', $this->input->post('product_category')),
            'product_content' => $this->input->post('product_content'),
            'product_sort' => $this->input->post('product_sort'),
            // 'product_title_en'  => $this->input->post('product_title_en'),
            'product_description'  => $this->input->post('product_description'),
            'product_on_the_shelf' => $this->input->post('product_on_the_shelf'),
            'product_off_the_shelf' => $this->input->post('product_off_the_shelf'),
            // 'product_description_en'  => $this->input->post('product_description_en'),
            'product_price' => $this->input->post('product_price'),
            'creator_id'   => $this->ion_auth->user()->row()->id,
            'created_at'   => date('Y-m-d H:i:s'),
        );
        $id = $this->mysql_model->_insert('products',$data);

        if(!empty($_FILES['product_image']['tmp_name'])){
            $product_image = '';
            $this->load->library('upload');
            $ext = pathinfo($_FILES['product_image']['name'], PATHINFO_EXTENSION);
            $product_image = 'p_img_'.$id.'_'.date('YmdHis').'.'.$ext;
            $config['upload_path']          = './assets/uploads/';
            $config['allowed_types']        = 'jpeg|jpg|png';
            $config['file_name']            = $product_image;
            $this->upload->initialize($config);
            if($this->upload->do_upload('product_image')){
                $uploadedImage = $this->upload->data();
                $this->resizeImage($uploadedImage['file_name']);
            }
            $data = array(
                'product_image' => $product_image,
            );
            $this->db->where('product_id', $id);
            $this->db->update('products', $data);
        }

        $this->session->set_flashdata('message', '商品建立成功！');
        redirect( base_url() . 'admin/products');
    }

    public function edit($id)
    {
        $this->data['page_title'] = '編輯商品';
        $this->data['category'] = $this->mysql_model->_select('product_category');
        $this->data['product'] = $this->mysql_model->_select('products','product_id',$id,'row');
        $this->render('admin/products/edit');
    }

    public function update($id)
    {
        $data = array(
            'product_title'  => $this->input->post('product_title'),
            'product_category' => implode(',', $this->input->post('product_category')),
            'product_content' => $this->input->post('product_content'),
            // 'product_title_en'  => $this->input->post('product_title_en'),
            'product_description'  => $this->input->post('product_description'),
            'product_on_the_shelf' => $this->input->post('product_on_the_shelf'),
            'product_off_the_shelf' => $this->input->post('product_off_the_shelf'),
            // 'product_description_en'  => $this->input->post('product_description_en'),
            'product_price' => $this->input->post('product_price'),
            'updater_id'  => $this->ion_auth->user()->row()->id,
            'updated_at'  => date('Y-m-d H:i:s'),
        );
        $this->db->where('product_id', $id);
        $this->db->update('products', $data);

        if(!empty($_FILES['product_image']['tmp_name'])){
            $product_image = '';
            $this->load->library('upload');
            $ext = pathinfo($_FILES['product_image']['name'], PATHINFO_EXTENSION);
            $product_image = 'p_img_'.$id.'_'.date('YmdHis').'.'.$ext;
            $config['upload_path']          = './assets/uploads/';
            $config['allowed_types']        = 'jpeg|jpg|png';
            $config['file_name']            = $product_image;
            $this->upload->initialize($config);
            if($this->upload->do_upload('product_image')){
                $uploadedImage = $this->upload->data();
                $this->resizeImage($uploadedImage['file_name']);
            }
            $data = array(
                'product_image' => '/assets/uploads/'.$product_image,
            );
            $this->db->where('product_id', $id);
            $this->db->update('products', $data);
        }

        $this->session->set_flashdata('message', '商品更新成功！');
        redirect($_SERVER['HTTP_REFERER']);
    }

    // public function delete($id)
    // {
    //     $this->db->where('product_id', $id);
    //     $this->db->delete('products');

    //     redirect( base_url() . 'admin/products');
    // }

    public function on_the_shelf($id)
    {
        $data = array(
            'product_status' => '1',
        );
        $this->db->where('product_id', $id);
        $this->db->update('products', $data);
        $this->session->set_flashdata('message', '商品上架成功');
        redirect($_SERVER['HTTP_REFERER']);
    }

    public function go_off_the_shelf($id)
    {
        $data = array(
            'product_status' => '2',
        );
        $this->db->where('product_id', $id);
        $this->db->update('products', $data);
        $this->session->set_flashdata('message', '商品下架成功');
        redirect($_SERVER['HTTP_REFERER']);
    }

    public function cancel_image()
    {
        $id = $this->input->post('product_id');
        $data = array(
            'product_image' => '',
        );
        $this->db->where('product_id', $id);
        if($this->db->update('products', $data)){
            echo 'ok';
        }
    }

    public function resizeImage($filename)
    {
        $source_path = $_SERVER['DOCUMENT_ROOT'] . '/assets/uploads/' . $filename;
        $target_path = $_SERVER['DOCUMENT_ROOT'] . '/assets/thumbs/';
        $config_manip = array(
            'image_library' => 'gd2',
            'source_image' => $source_path,
            'new_image' => $target_path,
            'maintain_ratio' => TRUE,
            'create_thumb' => TRUE,
            'thumb_marker' => '',
            'width' => 300,
            'height' => 300
        );

        $this->load->library('image_lib', $config_manip);
        if (!$this->image_lib->resize()) {
            echo $this->image_lib->display_errors();
        }

        $this->image_lib->clear();
    }

    public function multiple_action()
    {
        if (!empty($this->input->post('product_id'))) {
            foreach ($this->input->post('product_id') as $product_id) {
                if($this->input->post('action')=='delete'){
                    $this->db->where('product_id', $product_id);
                    $this->db->delete('products');
                    $this->session->set_flashdata('message', '商品刪除成功！');
                }
            }
        }
        redirect( base_url() . 'admin/products');
    }

    // 商品分類 ---------------------------------------------------------------------------------

    public function category()
    {
        $query = $this->db->get('top_category');

        $this->data['page_title'] = '商品分類';
        $this->data['category'] = $this->products_model->getTopCategory();
        $this->data['sub_category'] = $this->products_model->getSubCategory();

        $this->render('admin/products/category/index');
        
        return $query->result_array();
    }

    public function insert_category()
    {
        $this->data['page_title'] = '新增商品分類';

        $data = array(
            'product_category_parent' => $this->input->post('product_category_parent'),
            'product_category_name'   => $this->input->post('product_category_name'),
            'product_category_sort'   => $this->input->post('product_category_sort'),
            'creator_id'              => $this->ion_auth->user()->row()->id,
            'created_at'              => date('Y-m-d H:i:s'),
        );

        $this->db->insert('product_category', $data);
        redirect( base_url() . 'admin/products/category');
    }

    public function edit_category($id)
    {
        $this->data['page_title'] = '編輯商品分類';
        $this->data['top_category'] = $this->products_model->getTopCategory();
        $this->data['category'] = $this->mysql_model->_select('product_category','product_category_id',$id,'row');

        $this->render('admin/products/category/edit');
    }

    public function update_category($id)
    {
        $data = array(
            'product_category_parent' => $this->input->post('product_category_parent'),
            'product_category_name'   => $this->input->post('product_category_name'),
            'product_category_sort'   => $this->input->post('product_category_sort'),
            'updater_id'              => $this->ion_auth->user()->row()->id,
            'updated_at'              => date('Y-m-d H:i:s'),
        );
        $this->db->where('product_category_id', $id);
        $this->db->update('product_category', $data);

        redirect( base_url() . 'admin/products/category');
    }

    public function delete_category($id)
    {
        $this->db->where('product_category_id', $id);
        $this->db->delete('product_category');

        $this->db->where('product_category_id', $id);
        $this->db->delete('product_category_list');
        redirect( base_url() . 'admin/products/category');
    }

    public function update_product_category_list()
    {
        // $this->db->where('product_category_parent');
        $query = $this->db->get('products');
        if ($query->num_rows() > 0) {
            $this->db->truncate('product_category_list');
            foreach($query->result_array() as $product){
                $data = array(
                    'product_id'          => $product['product_id'],
                    'product_category_id' => $product['product_category'],
                );
                $this->db->insert('product_category_list', $data);
            }
        }
    }

}