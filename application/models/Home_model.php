<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Home_model extends CI_Model {

    function __construct() {
        parent::__construct();
    }

    public function GetBanner()
    {
        $this->db->where('banner_on_the_shelf <=', date('Y-m-d H:i:s'));
        $this->db->where('banner_off_the_shelf >=', date('Y-m-d H:i:s'));
        $this->db->where('banner_status', '1');
        $this->db->order_by('banner_sort','asc');
        $query = $this->db->get('banner');
        return ($query->num_rows() > 0)?$query->result_array():false;
    }

    function get_post_category() {
        $this->db->where('post_category_show_home', '1');
        $this->db->order_by('post_category_sort', 'asc');
        $query = $this->db->get('post_category');
        return ($query->num_rows() > 0)?$query->result_array():false;
    }

}