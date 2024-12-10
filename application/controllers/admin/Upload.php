<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Upload extends Admin_Controller {

    public function __construct()
    {
        parent::__construct();
    }

    public function index()
    {
        $this->data['page_title'] = '上傳';
        $this->render('admin/upload/index');
    }

    public function do_upload()
    {
        $config['upload_path'] = "./assets/uploads/csv_file";
        $config['allowed_types'] = "doc|docx|csv|xls|xlsx";
        // $config['encrypt_name'] = TRUE;

        $this->load->library('upload',$config);
        if($this->upload->do_upload("file")){
            $data = array('upload_data' => $this->upload->data());
            // 回傳檔案名稱
            echo '上傳成功: '.$this->upload->data('file_name');
        } else {
            echo '上傳失敗，請使用Word、Excel、CSV的檔案格式重新上傳。';
        }
    }

    public function do_upload1()
    {
        /* 以下這種做法, 上傳中文名的檔案, 才不會有問題  */
        // HTML中<input type="file" name="userfile"...
        $ufile = $_FILES["file"];
        // 原檔名, 網頁用的是UTF-8格式
        $filename_utf8 = $ufile["name"];
        // 移除中英文和數字外的字符
        // $filename_utf8 = preg_replace("/[^\x{4e00}-\x{9fa5}A-Za-z0-9_.]+/u","",$filename_utf8);
        // UTF-8轉BIG5 檔名才不會變成亂碼 (檔案系統的編碼是BIG5)
        $filename = mb_convert_encoding($filename_utf8,"big5","utf-8");
        $_FILES['ufile']['name'] = $filename;
        $_FILES['ufile']['type'] = $ufile['type'];
        $_FILES['ufile']['tmp_name'] = $ufile['tmp_name'];
        $_FILES['ufile']['error'] = $ufile['error'];
        $_FILES['ufile']['size'] = $ufile['size'];

        $path = dirname($_SERVER["SCRIPT_FILENAME"]) . "./assets/uploads/csv_file";
        $config = array();
        $config["upload_path"]   = $path;
        $config["allowed_types"] = "csv";
        $config["max_size"]      = "0";
        $config["overwrite"]     = TRUE;
        $config["max_filename"]  = "128";

        $this->load->library("upload",$config);
        $this->upload->initialize($config);
        if (file_exists("./assets/uploads/csv_file/" . $_FILES["ufile"]["name"])){
            echo '檔案: '.$_FILES["ufile"]["name"] . " 已經存在。";
        } else {
            if($this->upload->do_upload("ufile")) {  // 改用轉換後的陣列$_FILES["uflie"]
                // $file = $this->upload->data();
                // echo '上傳成功。檔案: '.$this->upload->data('file_name');
                echo '上傳成功。';
            } else {
                echo '上傳失敗，請檢查檔案格式。';
            }
        }
    }
}