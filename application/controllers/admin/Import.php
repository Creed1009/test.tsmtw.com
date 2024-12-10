<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Import extends Admin_Controller {

    public function __construct()
    {
        parent::__construct();
        $this->load->library(array('ion_auth','form_validation'));
        $this->load->helper(array('url','language'));

        $this->form_validation->set_error_delimiters($this->config->item('error_start_delimiter', 'ion_auth'), $this->config->item('error_end_delimiter', 'ion_auth'));

        $this->lang->load('auth');
    }

    public function users()
    {
        $tables = $this->config->item('tables','ion_auth');
        $identity_column = $this->config->item('identity','ion_auth');
        $this->data['identity_column'] = $identity_column;

        // CSV檔裡面，只放要用到的東西，多的不要放
        if(isset($_POST["import"]))
        {
            ini_set('max_execution_time', 0);
            if($_FILES["file"]["size"] > 0)
            {
                $file = fopen($_FILES["file"]["tmp_name"], "r") or die("Unable to open file!");
                while (($importdata = fgetcsv($file, 30000, ',')) !== FALSE)
                {

                    if(!empty($importdata[0])){
                        $this->db->select('username');
                        $this->db->where('username', $importdata[0]);
                        $this->db->limit(1);
                        $query = $this->db->get('users');
                        // 如果使用者[存在]，則更新
                        if ($query->num_rows() > 0) {

                            // $update_data = array(
                            //     'username' => get_empty($importdata[0]),
                            //     'active' => get_empty($importdata[2]),
                            //     'name' => get_empty($importdata[3]),
                            //     'cellphone' => get_empty($importdata[4]),
                            //     'phone' => get_empty($importdata[5]),
                            //     'birthday' => get_empty($importdata[6]),
                            //     'id_number' => get_empty($importdata[7]),
                            //     'line_id' => get_empty($importdata[8]),
                            //     'gender' => get_empty($importdata[9]),
                            //     'school' => get_empty($importdata[10]),
                            //     'job_title' => get_empty($importdata[11]),
                            //     // 'member_category' => '',
                            //     // 'public_private' => '',
                            //     // 'member_type' => '',
                            //     'member_number' => get_empty($importdata[17]),
                            //     'contact_address' => get_empty($importdata[12]),
                            //     'registration_address' => get_empty($importdata[13]),
                            //     'subscript' => get_empty($importdata[14]),
                            //     'certification' => get_empty($importdata[15]),
                            //     'certification_year' => get_empty($importdata[16]),
                            //     // 'company' => '',
                            //     'remark' => get_empty($importdata[18]),
                            //     'updater_id' => $this->ion_auth->user()->row()->id,
                            //     'updated_at' => date('Y-m-d H:i:s'),
                            // );

                            // $this->db->where('email', $importdata[1]);
                            // $this->db->update('users', $update_data);

                        // 如果使用者[不存在]，則新增
                        } else {

                            $email    = strtolower(get_empty($importdata[1]));
                            $identity = ($identity_column==='email') ? $email : get_empty($importdata[0]);
                            $password = 'aaaa1111';

                            $additional_data = [
                                'first_name' => '',
                                'last_name' => '',
                                'active' => get_empty($importdata[2]),
                                'name' => get_empty($importdata[3]),
                                'cellphone' => get_empty($importdata[4]),
                                'phone' => get_empty($importdata[5]),
                                'birthday' => get_empty($importdata[6]),
                                'id_number' => get_empty($importdata[7]),
                                'line_id' => get_empty($importdata[8]),
                                'gender' => get_empty($importdata[9]),
                                'school' => get_empty($importdata[10]),
                                'job_title' => get_empty($importdata[11]),
                                'member_category' => '',
                                'public_private' => '',
                                'member_type' => '',
                                'member_number' => get_empty($importdata[17]),
                                'contact_address' => get_empty($importdata[12]),
                                'registration_address' => get_empty($importdata[13]),
                                'subscript' => get_empty($importdata[14]),
                                'certification' => get_empty($importdata[15]),
                                'certification_year' => get_empty($importdata[16]),
                                'company' => '',
                                'remark' => get_empty($importdata[18]),
                                'creator_id' => $this->ion_auth->user()->row()->id,
                                'created_at' => date('Y-m-d H:i:s'),
                            ];

                            if($importdata[0]!='學校'){
                                $this->ion_auth->register($identity, $password, $email, $additional_data);
                            }

                        }
                    }

                }
                fclose($file);
                echo '<div style="color: green; font-weight: bold;">匯入成功！</div>';
                echo '<a href="/admin/import/users" class="btn btn-primary">回到匯入</a>';
            } else {
                echo '<div style="color: red; font-weight: bold;">匯入失敗...</div>';
                echo '<a href="/admin/import/users" class="btn btn-primary">回到匯入</a>';
            }
        } else {
            $this->data['page_title'] = '匯入CSV';
            $this->render('admin/import/index');
        }
    }

    public function quick_users()
    {
        $tables = $this->config->item('tables','ion_auth');
        $identity_column = $this->config->item('identity','ion_auth');
        $this->data['identity_column'] = $identity_column;
        $date = date('Y-m-d H:i:s');
        $user_id = $this->ion_auth->user()->row()->id;

        // CSV檔裡面，只放要用到的東西，多的不要放
        if(isset($_POST["import"]))
        {
            ini_set('max_execution_time', 0);
            if($_FILES["file"]["size"] > 0)
            {
                $file = fopen($_FILES["file"]["tmp_name"], "r") or die("Unable to open file!");
                while (($importdata = fgetcsv($file, 7000, ',')) !== FALSE)
                {

                    if(!empty($importdata[0])){
                        $this->db->select('username');
                        $this->db->where('username', $importdata[1]);
                        $this->db->limit(1);
                        $query = $this->db->get('users');
                        // 如果使用者[存在]，則更新
                        if ($query->num_rows() > 0) {

                            // $fields = array('學校', '權利狀態', '會員卡號', '姓名', 'EMAIL', '電話', '會員屬性', '會員認證年份');
                            if(intval($importdata[5])==1){
                                $active = 1;
                            } elseif (intval($importdata[5])==3) {
                                $active = 1;
                            } else {
                                $active = 0;
                            }

                            $update_data = array(
                                // 'school' => match_string(get_empty($importdata[0])),
                                'active' => $active,
                                // 'member_number' => get_empty_mb_convert_encoding($importdata[1]),
                                'name' => get_empty_mb_convert_encoding($importdata[2]),
                                'email' => get_empty_mb_convert_encoding($importdata[3]),
                                'phone' => get_empty($importdata[4]),
                                'certification' => get_empty($importdata[5]),
                                'certification_year' => get_empty_mb_convert_encoding($importdata[6]),
                                'remark' => get_empty_mb_convert_encoding($importdata[7]),
                                'updater_id' => $user_id,
                                'updated_at' => $date,
                            );

                            $this->db->where('username', $importdata[1]);
                            $this->db->update('users', $update_data);

                        // 如果使用者[不存在]，則新增
                        } else {

                            $email    = strtolower($importdata[3]);
                            $identity = ($identity_column==='email') ? $email : get_empty($importdata[1]);
                            $password = 'aaaa1111';

                            // if($identity!='' && $importdata[0]!='學校' && $importdata[0]!='填寫說明'){

                                $additional_data = [
                                    'first_name' => '',
                                    'last_name' => '',
                                    'active' => 1,
                                    'name' => get_empty_mb_convert_encoding($importdata[2]),
                                    'cellphone' => get_empty($importdata[4]),
                                    'phone' => '',
                                    'birthday' => '',
                                    'id_number' => '',
                                    'line_id' => '',
                                    'gender' => '',
                                    'school' => match_string(get_empty($importdata[0])),
                                    'job_title' => '',
                                    'member_category' => '',
                                    'public_private' => '',
                                    'member_type' => '',
                                    'member_number' => get_empty($importdata[1]),
                                    'contact_address' => '',
                                    'registration_address' => '',
                                    'subscript' => 'Y',
                                    'certification' => get_empty($importdata[5]),
                                    'certification_year' => get_empty_mb_convert_encoding($importdata[6]),
                                    'company' => '',
                                    'remark' => get_empty_mb_convert_encoding($importdata[7]),
                                    'creator_id' => $user_id,
                                    'created_at' => $date,
                                ];

                                $this->ion_auth->register($identity, $password, $email, $additional_data);
                            // }

                        }
                    }

                }
                fclose($file);
                $this->db->where('name', '姓名');
                $this->db->delete('users');

                // 重新加入XXX001的帳號為支會長
                // $this->add_user_group();

                echo '<div style="color: green; font-weight: bold;">匯入成功！</div>';
                echo '<a href="/admin/import/quick_users" class="btn btn-primary">回到匯入</a>';
            } else {
                echo '<div style="color: red; font-weight: bold;">匯入失敗...</div>';
                echo '<a href="/admin/import/quick_users" class="btn btn-primary">回到匯入</a>';
            }
        } else {
            $this->data['page_title'] = '匯入CSV';
            $this->render('admin/import/quick-index');
        }
    }

    function add_user_group()
    {
        // 刪除支會長群組
        $this->db->where('group_id', '2');
        $this->db->delete('users_groups');

        $this->db->select('id,username');
        // $this->db->where('product_category_parent');
        $query = $this->db->get('users');
        if ($query->num_rows() > 0) {
            foreach($query->result_array() as $user){
                if(substr($user['username'], -3)=='001'){
                    $data = array(
                        'user_id' => $user['id'],
                        'group_id' => 2,
                    );
                    $this->db->insert('users_groups', $data);
                }
            }
        }
    }

    function check_school_users()
    {
        $tables = $this->config->item('tables','ion_auth');
        $identity_column = $this->config->item('identity','ion_auth');
        $this->data['identity_column'] = $identity_column;
        $date = date('Y-m-d H:i:s');
        $user_id = $this->ion_auth->user()->row()->id;
        $query = $this->db->get('school_code');
        if ($query->num_rows() > 0) {
            foreach($query->result_array() as $school_code){

                $this->db->select('username');
                $this->db->where('username', $school_code['school_code']);
                $this->db->limit(1);
                $query = $this->db->get('users');
                // 如果使用者[存在]，則更新
                if ($query->num_rows() > 0) {
                    $user = $query->result_array();

                    $update_data = array(
                        // 'school' => match_string(get_empty($importdata[0])),
                        'active' => 1,
                        // 'member_number' => get_empty_mb_convert_encoding($school_code['school_code']),
                        // 'name' => get_empty_mb_convert_encoding($school_code['school_name']),
                        // 'email' => '',
                        'phone' => '',
                        'certification' => 1,
                        'certification_year' => (date('Y')-1911),
                        'remark' => '',
                        'updater_id' => $user_id,
                        'updated_at' => $date,
                    );

                    $this->db->where('username', $school_code['school_code']);
                    $this->db->update('users', $update_data);

                // 如果使用者[不存在]，則新增
                } else {

                    $email    = strtolower($school_code['school_code'].'@nshstu.org.tw');
                    $identity = ($identity_column==='email') ? $email : get_empty($school_code['school_code']);
                    $password = 'aaaa1111';
                    $groups = array(2);

                    $additional_data = [
                        'first_name' => '',
                        'last_name' => '',
                        'active' => 1,
                        'name' => get_empty_mb_convert_encoding($school_code['school_name']),
                        'cellphone' => '',
                        'phone' => '',
                        'birthday' => '',
                        'id_number' => '',
                        'line_id' => '',
                        'gender' => '',
                        'school' => match_string($school_code['school_code']),
                        'job_title' => '',
                        'member_category' => '',
                        'public_private' => '',
                        'member_type' => '',
                        'member_number' => $school_code['school_code'],
                        'contact_address' => '',
                        'registration_address' => '',
                        'subscript' => 'Y',
                        'certification' => 1,
                        'certification_year' => (date('Y')-1911),
                        'company' => '',
                        'remark' => '',
                        'creator_id' => $user_id,
                        'created_at' => $date,
                    ];

                    $this->ion_auth->register($identity, $password, $email, $additional_data, $groups);

                }

            }
        }
    }

    function check_school_users_groups()
    {
        $count=0;
        $query = $this->db->get('users');
        if ($query->num_rows() > 0) {
            foreach($query->result_array() as $users){
                $this->db->where('user_id', $users['id']);
                $this->db->limit(1);
                $query = $this->db->get('users_groups');
                if ($query->num_rows()==0) {
                    $data = array(
                        'user_id' => $users['id'],
                        'group_id' => 2,
                    );
                    $this->db->insert('users_groups', $data);
                    $count++;
                }
            }
        }
        echo $count;
    }

}