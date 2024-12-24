<?php defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * @property Mysql_model $mysql_model
 * @property Ion_auth $ion_auth
 * @property Ion_auth_model $ion_auth_model
 * @property Setting_model $setting_model
 * @property CI_Form_validation $form_validation
 * @property CI_Session $session
 * @property CI_Input $input
 * @property CI_DB_query_builder $db
 */


class Setting extends Admin_Controller {

    public function __construct()
    {
        parent::__construct();
    }

    public function general()
    {
        $this->data['page_title'] = '基本設定';
        $this->render('admin/setting/general');
    }

    public function update_general()
    {
        $query = $this->db->get('setting_general');
        foreach($query->result_array() as $result){
            //if(!empty($this->input->post($result['setting_general_name']))){
                $data = array(
                    'setting_general_value' => $this->input->post($result['setting_general_name']),
                );
                $this->db->where('setting_general_name', $result['setting_general_name']);
                $this->db->update('setting_general', $data);
            //}
        }

        $this->session->set_flashdata('message', '基本設定成功！');
        redirect($_SERVER['HTTP_REFERER']);
    }

    // 商品單位 ---------------------------------------------------------------------------------

    public function unit()
    {
        $this->data['page_title'] = '商品單位';
        $this->data['unit'] = $this->mysql_model->_select('unit');

        $this->render('admin/setting/unit/index');
    }

    public function insert_unit()
    {
        $this->data['page_title'] = '新增商品單位';

        $data = array(
            'unit_name'  => $this->input->post('unit_name'),
            'creator_id' => $this->ion_auth->user()->row()->id,
            'created_at' => date('Y-m-d H:i:s'),
        );

        $this->db->insert('unit', $data);
        redirect( base_url() . 'setting/unit');
    }

    public function edit_unit($id)
    {
        $this->data['page_title'] = '編輯商品單位';
        $this->data['unit'] = $this->mysql_model->_select('unit','unit_id',$id,'row');

        $this->render('admin/setting/unit/edit');
    }

    public function update_unit($id)
    {
        $data = array(
            'unit_name'  => $this->input->post('unit_name'),
            'updater_id' => $this->ion_auth->user()->row()->id,
            'updated_at' => date('Y-m-d H:i:s'),
        );
        $this->db->where('unit_id', $id);
        $this->db->update('unit', $data);

        redirect( base_url() . 'setting/unit');
    }

    public function delete_unit($id)
    {
        $this->db->where('unit_id', $id);
        $this->db->delete('unit');
        redirect( base_url() . 'setting/unit');
    }

}