<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Change_log extends Admin_Controller {

    public function __construct()
    {
        parent::__construct();
    }

    public function index()
    {
        $this->data['page_title'] = '修改密碼紀錄';
        $this->data['change_log'] = $this->mysql_model->_select('change_log');

        $this->render('admin/others/change_log');
    }

}