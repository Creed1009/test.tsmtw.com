<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Export extends Admin_Controller {

    public function __construct()
    {
        parent::__construct();
    }

    public function users()
    {
        $AlllineData = array();
        $type = $this->input->get('type');

        if($this->ion_auth->in_group('president')){
            $school = $this->ion_auth->user()->row()->school;
            $this->db->where('school', $school);
        }

        $this->db->join('users_groups', 'users_groups.user_id = users.id');
        $this->db->where('group_id', 3);
        $this->db->group_by('users.id');
        $query = $this->db->get('users');

        if($query->num_rows() > 0){

            $fields = array('會員帳號', '電子郵件', '權利狀態', '姓名', '手機號碼', '電話', '生日', '身分證號碼', 'LINE ID', '性別(Male/Female)', '服務學校', '職稱', '通訊地址', '戶籍地址', '訂閱電子報(Y/N)', '會員屬性', 'VIP會員認證年份(YYYY)','會員編號',  '備註');

            // array_push($AlllineData, $fields);

            $delimiter = ",";
            $filename = "會員_" . date('Y-m-d H-i-s') . ".csv";
            //create a file pointer
            $f = fopen('php://memory', 'w');
            fputs($f, $bom =( chr(0xEF) . chr(0xBB) . chr(0xBF) ));
            fputcsv($f, $fields, $delimiter);

            foreach($query->result_array() as $row){

                $lineData = array
                (
                    $row['username'],
                    $row['email'],
                    $row['active'].'. '.get_user_active($row['active']),
                    $row['name'],
                    $row['cellphone'],
                    $row['phone'],
                    $row['birthday'],
                    $row['id_number'],
                    $row['line_id'],
                    $row['gender'],
                    $row['school'],
                    $row['job_title'],
                    $row['contact_address'],
                    $row['registration_address'],
                    $row['subscript'],
                    $row['certification'].'. '.get_user_certification($row['certification']),
                    $row['certification_year'],
                    $row['member_number'],
                    $row['remark'],
                );

                // array_push($AlllineData, $lineData);
                fputcsv($f, $lineData, $delimiter);

            }

            //move back to beginning of file
            fseek($f, 0);
            //set headers to download file rather than displayed
            header('Content-Type: text/csv');
            header('Content-Disposition: attachment; filename="' . $filename . '";');
            //output all remaining data on a file pointer
            fpassthru($f);

        // exit;
        }
    }

    public function users_quick()
    {
        $AlllineData = array();
        $type = $this->input->get('type');

        if($this->ion_auth->in_group('president')){
            $school = $this->ion_auth->user()->row()->school;
            $file_name = get_school_name_by_code($school);
            $this->db->where('school', $school);
        } else {
            $file_name = '會員';
        }

        $this->db->join('users_groups', 'users_groups.user_id = users.id');
        $this->db->where('group_id', 3);
        $this->db->group_by('users.id');
        $query = $this->db->get('users');

        if($query->num_rows() > 0){

            $fields1 = array('填寫說明', '', '若有新會員不在名單上 
                請於最後打入資料 *姓名為必備', '', '', '1:一般會員(正式教師、代理代課教師、及學校職工) 
3:特殊會員(非高中職教師、兼代課教師、兼職員工、其他)', '會員認證年份', '收費說明');
            $fields2 = array('學校', '會員卡號', '姓名', 'EMAIL', '電話', '會員屬性', '會員認證年份', '備註');

            // array_push($AlllineData, $fields);

            $delimiter = ",";
            $filename = $file_name."_" . date('Y-m-d H-i-s') . ".csv";
            //create a file pointer
            $f = fopen('php://memory', 'w');
            fputs($f, $bom =( chr(0xEF) . chr(0xBB) . chr(0xBF) ));
            fputcsv($f, $fields1, $delimiter);
            fputcsv($f, $fields2, $delimiter);

            foreach($query->result_array() as $row){

                $lineData = array (
                    ''.$row['school'].' '.get_school_name_by_code($row['school']).'',
                    ''.$row['member_number'].'',
                    ''.$row['name'].'',
                    ''.$row['email'].'',
                    ''.$row['phone'].'',
                    ''.$row['certification'].'. '.get_user_certification($row['certification']).'',
                    ''.$row['certification_year'].'',
                    ''.$row['remark'].'',
                );

                // array_push($AlllineData, $lineData);
                fputcsv($f, $lineData, $delimiter);

            }

            //move back to beginning of file
            fseek($f, 0);
            //set headers to download file rather than displayed
            header('Content-Type: text/csv');
            header('Content-Disposition: attachment; filename="' . $filename . '";');
            //output all remaining data on a file pointer
            fpassthru($f);

        // exit;
        }
    }

}