<?php defined('BASEPATH') OR exit('No direct script access allowed');


class Hao extends Public_Controller {

    public function __construct()
    {
        parent::__construct();
        // Load necessary models, libraries, etc.
        // $this->load->model('Posts_model');
    }

    public function index()
    {
        // This method can be used to display a list of items or a welcome page
        $this->data['page_title'] = 'Welcome to the New Controller';
        $this->render('pages/hao');     }

    public function view($id)
    {
        // Display a specific item based on the ID
        $this->data['item'] = $this->Posts_model->getItemById($id);
        $this->render('pages/view_item');
    }
}