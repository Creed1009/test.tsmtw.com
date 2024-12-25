<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Contact_model extends CI_Model {

    function getRows($params = array()){
        $this->db->select('*');
        $this->db->from('contact');
        //filter data by searched keywords
        if(!empty($params['search']['keywords'])){
            $this->db->like('contact_title',$params['search']['keywords']);
        }
        if(!empty($params['search']['category'])){
            $this->db->where('contact_category',$params['search']['category']);
        }
        // if(!empty($params['search']['status'])){
        //     $this->db->where('contact_status',$params['search']['status']);
        // } else {
        //     $this->db->where('contact_status', '1');
        // }
        if(!empty($params['search']['sortBy'])){
            $this->db->order_by('contact_id',$params['search']['sortBy']);
        } else {
            $this->db->order_by('contact_id','desc');
        }
        if($this->ion_auth->is_admin()){

        } else {
            $school = $this->ion_auth->user()->row()->school;
            $this->db->where('contact_school', $school);
        }
        //set start and limit
        // if(array_key_exists("start",$params) && array_key_exists("limit",$params)){
        //     $this->db->limit($params['limit'],$params['start']);
        // }elseif(!array_key_exists("start",$params) && array_key_exists("limit",$params)){
        //     $this->db->limit($params['limit']);
        // }
        //get contact
        $query = $this->db->get();
        //return fetched data
        return ($query->num_rows() > 0)?$query->result_array():FALSE;
    }

}