<?php defined('BASEPATH') OR exit('No direct script access allowed');

class dashboard extends Admin_Controller {

    function __construct()
    {
        parent::__construct();
    }

    public function index()
    {
        $this->data['page_title'] = '控制台';
        $this->render('admin/dashboard/index');
    }

    // function auto_create_users()
    // {
    // 	$tables = $this->config->item('tables','ion_auth');
    //     $identity_column = $this->config->item('identity','ion_auth');
    //     $this->data['identity_column'] = $identity_column;
    //     $date = date('Y-m-d H:i:s');
    //     $user_id = $this->ion_auth->user()->row()->id;
    //     $count=0;


    // 	$key = '001';
    //     $this->db->like('username', $key);
    //     $query = $this->db->get('users');
    //     // 如果使用者[存在]，則更新
    //     if ($query->num_rows() > 0) {
    //     	foreach ($query->result_array() as $user ) {
    //     		// echo $user['username'].'-----';

    //     		$email    = strtolower($user['email']);
    //             $identity = ($identity_column==='email') ? $email : substr($user['username'], 0, 6);
    //             $password = 'aaaa1111';

    //             $additional_data = [
    //                 'first_name' => '',
    //                 'last_name' => '',
    //                 'active' => 1,
    //                 'name' => ($user['name']),
    //                 'cellphone' => get_empty($user['cellphone']),
    //                 'phone' => '',
    //                 'birthday' => '',
    //                 'id_number' => '',
    //                 'line_id' => '',
    //                 'gender' => '',
    //                 'school' => match_string(get_empty($user['school'])),
    //                 'job_title' => '',
    //                 'member_category' => '',
    //                 'public_private' => '',
    //                 'member_type' => '',
    //                 'member_number' => get_empty($user['member_number']),
    //                 'contact_address' => '',
    //                 'registration_address' => '',
    //                 'subscript' => 1,
    //                 'certification' => get_empty($user['certification']),
    //                 'certification_year' => ($user['certification_year']),
    //                 'company' => '',
    //                 'remark' => ($user['remark']),
    //                 'creator_id' => $user_id,
    //                 'created_at' => $date,
    //             ];
    //             $this->ion_auth->register($identity, $password, $email, $additional_data);
    //             $count++;

    //     	}
    //     }
    //     echo $count;
    // }

}