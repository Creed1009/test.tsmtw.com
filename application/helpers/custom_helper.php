<?php defined('BASEPATH') OR exit('No direct script access allowed.');

function get_product_category_option($parent_id = 0, $sub_mark = '', $product_category_parent = '')
{
    $CI =& get_instance();
    $CI->db->where('product_category_parent', $parent_id);
    $query = $CI->db->get('product_category');
    if ($query->num_rows() > 0) {
        $selected = '';
        foreach($query->result_array() as $row){
            if($row['product_category_id']==$product_category_parent){$selected='selected';};
            echo '<option value="'.$row['product_category_id'].'" '.$selected.'>'.($sub_mark=='－'?'　':'').$sub_mark.$row['product_category_name'].' - '.$row['product_category_code'].'</option>';
            get_product_category_option($row['product_category_id'], $sub_mark.'－');
            $selected = '';
        }
    } else {
        return false;
    }
}

function get_product_category_td($parent_id = 0, $sub_mark = '')
{
    $CI =& get_instance();
    $CI->db->where('product_category_parent', $parent_id);
    $query = $CI->db->get('product_category');
    if ($query->num_rows() > 0) {
        foreach($query->result_array() as $row){
            echo '<tr>';
            echo '<td>'.$sub_mark.$row['product_category_name'].'</td>';
            echo '<td>'.$row['product_category_sort'].'</td>';
            echo '<td>';
            echo '<a href="/admin/products/edit_category/'.$row['product_category_id'].'" class="btn btn-info btn-sm"><i class="fa fa-edit"></i></a> ';
            echo '<a href="/admin/products/delete_category/'.$row['product_category_id'].'" class="btn btn-danger btn-sm" onclick="return confirm("確定要刪除嗎?")"><i class="fa fa-trash-o"></i></a>';
            echo '</td>';
            echo '</tr>';
            get_product_category_td($row['product_category_id'], $sub_mark.'－');
        }
    }
}

function get_product_category_checkbox($parent_id = 0, $sub_mark = '')
{
    $CI =& get_instance();
    $CI->db->where('product_category_parent', $parent_id);
    $query = $CI->db->get('product_category');
    if ($query->num_rows() > 0) {
        foreach($query->result_array() as $row){
            echo '<div class="checkbox '.($row['product_category_parent']==0?'category_'.$row['product_category_id']:'').' '.($row['product_category_parent']!=0?'category_'.$row['product_category_parent']:'').'" onclick="select_category('.($row['product_category_parent']==0?''.$row['product_category_id']:'').($row['product_category_parent']!=0?''.$row['product_category_parent']:'').')">';
            echo '<label>'.($sub_mark=='－'?'　　':'');
            echo '<input type="checkbox" name="product_category[]" value="'.$row['product_category_id'].'">';
            echo $sub_mark.$row['product_category_name'];
            echo '</label>';
            echo '</div>';
            get_product_category_checkbox($row['product_category_id'], $sub_mark.'－');
        }
    } else {
        return false;
    }
}

function get_product_category_checkbox_checked($product_id, $parent_id = 0, $sub_mark = '')
{
    $CI =& get_instance();
    $CI->db->where('product_category_parent', $parent_id);
    $query = $CI->db->get('product_category');
    if ($query->num_rows() > 0) {
        foreach($query->result_array() as $row){
            $checked = '';
            $CI->db->where('product_id', $product_id);
            $query2 = $CI->db->get('product_category_list');
            if ($query2->num_rows() > 0) {
                foreach($query2->result_array() as $cl) {
                    if($cl['product_category_id']==$row['product_category_id']) {
                        $checked = 'checked';
                        break;
                    }
                }
            }
            echo '<div class="checkbox '.($row['product_category_parent']==0?'category_'.$row['product_category_id']:'').' '.($row['product_category_parent']!=0?'category_'.$row['product_category_parent']:'').'" onclick="select_category('.($row['product_category_parent']==0?''.$row['product_category_id']:'').($row['product_category_parent']!=0?''.$row['product_category_parent']:'').')">';
            echo '<label>'.($sub_mark=='－'?'　　':'');
            echo '<input type="checkbox" name="product_category[]" value="'.$row['product_category_id'].'" '.$checked.'>';
            echo $sub_mark.$row['product_category_name'];
            echo '</label>';
            echo '</div>';
            get_product_category_checkbox_checked($product_id, $row['product_category_id'], $sub_mark.'－');
        }
    } else {
        return false;
    }
}

function get_empty($data)
{
    if (empty($data)) {
        return '';
    } else {
        return $data;
    }
}

function get_empty_mb_convert_encoding($data)
{
    if (empty($data)) {
        return '';
    } else {
        return $data;
        // return mb_convert_encoding($data,"utf-8","big5");
    }
}

function get_message_category($data)
{
    switch ($data)
    {
        case 'all':
            return "全部通知";
            break;
        case 'school':
            return "學校";
            break;
    }
}

function get_only_image($data)
{
    if(!empty($data)){
        $result = '<img src="/assets/uploads/'.$data.'">';
    } else {
        // $result = '<img src="/assets/images/no-image.jpg">';
        $result = '';
    }
    return $result;
}

function get_image($data)
{
    if(!empty($data)){
        $result = '<a href="/assets/uploads/'.$data.'" data-fancybox data-caption="'.$data.'"><img src="/assets/uploads/'.$data.'" class="img-responsive" /></a>';
    } else {
        // $result = '<img src="/assets/images/no-image.jpg" class="img-responsive" />';
        $result = '';
    }
    return $result;
}

function get_block_name($data)
{
	$CI =& get_instance();
	$CI->db->select('block_name');
	$query = $CI->db->get_where('block', array('block_id' => $data));
	if ($query->num_rows() > 0) {
        $row = $query->row_array();
		$data = $row['block_name'];
		return $data;
    }
}

function get_record_category_name($id)
{
    $CI =& get_instance();
    $CI->db->select('record_category_name');
    $query = $CI->db->get_where('record_category', array('record_category_id' => $id));
    if ($query->num_rows() > 0) {
        $result = $query->row_array();
        $data = $result['record_category_name'];
        return $data;
    }
}

function get_post_category_name($id)
{
    $CI =& get_instance();
    $CI->db->select('post_category_name');
    $query = $CI->db->get_where('post_category', array('post_category_id' => $id));
    if ($query->num_rows() > 0) {
        $result = $query->row_array();
        $data = $result['post_category_name'];
        return $data;
    }
}

function get_message_category_name($id)
{
    $CI =& get_instance();
    $CI->db->select('message_category_name');
    $query = $CI->db->get_where('message_category', array('message_category_id' => $id));
    if ($query->num_rows() > 0) {
        $result = $query->row_array();
        $data = $result['message_category_name'];
        return $data;
    }
}

function get_activity_category_name($id)
{
    $CI =& get_instance();
    $CI->db->select('activity_category_name');
    $query = $CI->db->get_where('activity_category', array('activity_category_id' => $id));
    if ($query->num_rows() > 0) {
        $result = $query->row_array();
        $data = $result['activity_category_name'];
        return $data;
    }
}

function get_school_name($id)
{
    $CI =& get_instance();
    $CI->db->select('school_name');
    $query = $CI->db->get_where('schools', array('school_id' => $id));
    if ($query->num_rows() > 0) {
        $result = $query->row_array();
        $data = $result['school_name'];
        return $data;
    }
}

function get_school_name_by_code($id)
{
    $CI =& get_instance();
    $CI->db->select('school_name');
    $query = $CI->db->get_where('schools', array('school_code' => $id));
    if ($query->num_rows() > 0) {
        $result = $query->row_array();
        $data = $result['school_name'];
        return $data;
    }
}

function get_link_category_name($id)
{
    $CI =& get_instance();
    $CI->db->select('link_category_name');
    $query = $CI->db->get_where('link_category', array('link_category_id' => $id));
    if ($query->num_rows() > 0) {
        $result = $query->row_array();
        $data = $result['link_category_name'];
        return $data;
    }
}

function get_product_category_name($id)
{
    $CI =& get_instance();
    $CI->db->select('product_category_name');
    $query = $CI->db->get_where('product_category', array('product_category_id' => $id));
    if ($query->num_rows() > 0) {
        $result = $query->row_array();
        $data = $result['product_category_name'];
        return $data;
    }
}

function get_product_category_front($id)
{
    $result='';
    $CI =& get_instance();
    //$CI->db->select('product_category_list');
    $query = $CI->db->get_where('product_category_list', array('product_id' => $id));
    if(!empty($query->result_array())) {
        foreach ($query->result_array() as $data ) {
            $result .= get_product_category_name($data['product_category_id']).'-';
        }
    }
    return $result;
}

function get_download_category_name($id)
{
    $CI =& get_instance();
    $CI->db->select('download_category_name');
    $query = $CI->db->get_where('download_category', array('download_category_id' => $id));
    if ($query->num_rows() > 0) {
        $result = $query->row_array();
        $data = $result['download_category_name'];
        return $data;
    }
}

function get_user_username($id)
{
    $CI =& get_instance();
    $CI->db->select('username');
    $query = $CI->db->get_where('users', array('id' => $id));
    if ($query->num_rows() > 0) {
        $result = $query->row_array();
        $data = $result['username'];
        return $data;
    } else {
        return '';
    }
}

function get_user_email($id)
{
    $CI =& get_instance();
    $CI->db->select('email');
    $query = $CI->db->get_where('users', array('id' => $id));
    if ($query->num_rows() > 0) {
        $result = $query->row_array();
        $data = $result['email'];
        return $data;
    } else {
        return '';
    }
}

function get_user_name($id)
{
    $CI =& get_instance();
    $CI->db->select('name');
    $CI->db->limit(1);
    $query = $CI->db->get_where('users', array('id' => $id));
    if ($query->num_rows() > 0) {
        $result = $query->row_array();
        $data = $result['name'];
        return $data;
    } else {
        return '';
    }
}

function get_user_group($id){
    $CI =& get_instance();
    $CI->db->join('groups', 'groups.id = users_groups.group_id');
    $CI->db->where('user_id', $id);
    $query = $CI->db->get('users_groups');
    return ($query->num_rows() > 0)?$query->result_array():false;
}

function get_column_name($data)
{
    switch ($data)
    {
        case '':
            return "";
            break;
        case 'password':
            return "密碼";
            break;
    }
}

function get_user_certification($data)
{
    switch ($data)
    {
        case '':
            return "";
            break;
        case '1':
            return "一般會員";
            break;
        case '2':
            return "無效會員";
            break;
        case '3':
            return "特殊會員";
            break;
    }
}

function get_user_active($data)
{
    switch ($data)
    {
        case '':
            return "";
            break;
        case '1':
            return "正常";
            break;
        case '0':
            return "停權";
            break;
    }
}

function get_tw_date($data)
{
    if(!empty($data)){
        $result = str_replace('-', '', $data);
        $result = substr($result, 0, 8);
        $result = $result - 19110000;
        $y = substr($result, 0, 3);
        $m = substr($result, 3, 2);
        $d = substr($result, 5, 2);
        return $y.'年'.$m.'月'.$d.'日';
    } else {
        return '年月日';
    }
}

function get_manufacturer_name($id)
{
    $CI =& get_instance();
    $CI->db->select('manufacturer_name');
    $query = $CI->db->get_where('manufacturers', array('manufacturer_id' => $id));
    if ($query->num_rows() > 0) {
        $result = $query->row_array();
        $data = $result['manufacturer_name'];
        return $data;
    }
}

function get_setting_general($name)
{
	$CI =& get_instance();
	$CI->db->where('setting_general_name', $name);
	$CI->db->select('setting_general_value');
	$query = $CI->db->get('setting_general');
	if ($query->num_rows() > 0) {
        $row = $query->row_array();
		$data = $row['setting_general_value'];
		return $data;
    }
}

function get_decimal_point()
{
	$CI =& get_instance();
	$CI->db->where('setting_general_name', 'decimal_point');
	$CI->db->select('setting_general_value');
	$query = $CI->db->get('setting_general');
	if ($query->num_rows() > 0) {
        $row = $query->row_array();
		$data = $row['setting_general_value'];
		return $data;
    }
}

function check_link($target_link)
{
    $link = '';
    if(!empty($target_link)){
        $str1 = $target_link;
        $str2 = 'http';
        if (false !== ($rst = strpos($str1, $str2))) {
            // echo 'find';
            $link .= $target_link;
        } else {
            // echo 'not find';
            $link .= 'http://'.$target_link;
        }
    }
    return $link;
}

function CI_send_email($to, $subject, $body)
{
    $CI =& get_instance();
    $CI->load->library('email');
    // $CI->email->set_smtp_host('mail.nshstu.org.tw');
    // $CI->email->set_smtp_user('service@nshstu.org.tw');
    // $CI->email->set_smtp_pass('Nshstu@admin1');
    // $CI->email->set_smtp_port(587);
    // $CI->email->set_smtp_crypto('');
    $CI->email->set_mailtype('html');

    $CI->email->to($to);
    // $CI->email->from(get_setting_general('smtp_email'), get_setting_general('smtp_forname'));
    $CI->email->from('service@nshstu.org.tw', get_setting_general('smtp_forname'));
    $CI->email->subject($subject);
    $CI->email->message($body);

    //Send email
    if($CI->email->send()){
        return true;
    } else {
        return false;
    }
}

function match_string($str)
{
    preg_match_all("/[a-zA-Z0-9]/", $str, $x);
    $b = join("", $x[0]);
    return $b;
}

function validate_email($email)
{
    if(!empty($email)){
        if (!preg_match("/([\w\-]+\@[\w\-]+\.[\w\-]+)/", $email)) {
            return false;
        } else {
            return true;
        }
    } else {
        return false;
    }
}

function check_mobile(){
    $regex_match="/(nokia|iphone|android|motorola|^mot\-|softbank|foma|docomo|kddi|up\.browser|up\.link|";
    $regex_match.="htc|dopod|blazer|netfront|helio|hosin|huawei|novarra|CoolPad|webos|techfaith|palmsource|";
    $regex_match.="blackberry|alcatel|amoi|ktouch|nexian|samsung|^sam\-|s[cg]h|^lge|ericsson|philips|sagem|wellcom|bunjalloo|maui|";
    $regex_match.="symbian|smartphone|midp|wap|phone|windows ce|iemobile|^spice|^bird|^zte\-|longcos|pantech|gionee|^sie\-|portalmmm|";
    $regex_match.="jig\s browser|hiptop|^ucweb|^benq|haier|^lct|opera\s*mobi|opera\*mini|320x320|240x320|176x220";
    $regex_match.=")/i";
    return preg_match($regex_match, strtolower($_SERVER['HTTP_USER_AGENT']));
}

function wp_is_mobile() {
    static $is_mobile = null;

    if ( isset( $is_mobile ) ) {
        return $is_mobile;
    }

    if ( empty($_SERVER['HTTP_USER_AGENT']) ) {
        $is_mobile = false;
    } elseif ( strpos($_SERVER['HTTP_USER_AGENT'], 'Mobile') !== false // many mobile devices (all iPhone, iPad, etc.)
        || strpos($_SERVER['HTTP_USER_AGENT'], 'Android') !== false
        || strpos($_SERVER['HTTP_USER_AGENT'], 'Silk/') !== false
        || strpos($_SERVER['HTTP_USER_AGENT'], 'Kindle') !== false
        || strpos($_SERVER['HTTP_USER_AGENT'], 'BlackBerry') !== false
        || strpos($_SERVER['HTTP_USER_AGENT'], 'Opera Mini') !== false
        || strpos($_SERVER['HTTP_USER_AGENT'], 'Opera Mobi') !== false ) {
        $is_mobile = true;
    } else {
        $is_mobile = false;
    }

    return $is_mobile;
}

function positive_integer($num,$positive=true,$int=true){
/**
 * $num         字符串判断
 * $positive    正负判断
 * $int         整数/小数判断
 */
    if($num)
    {
        if(is_numeric($num)){
            if($positive && $num>0 && !$int){
                return true; //正数
            }elseif($int && floor($num)==$num && !$positive){
                return true; //整数
            }elseif($positive && $int && $num>0 && floor($num)==$num){
                return true; //正整数
            }elseif($positive && $int && $num>0 && floor($num)!=$num){
                return true; //正小数
            }elseif($positive && $num<0 && !$int){
                return false; //负数
            }elseif($int && floor($num)!=$num && !$positive){
                return false; //小数
            }elseif($positive && $int && $num<0 && floor($num)!=$num){
                return false; //负小数
            }elseif($positive && $int && $num<0 && floor($num)==$num){
                return false; //负整数
            } else {
                return false; //未知类型的数字
            }
        } else {
            return false; //不是数字
        }
    }elseif($num==='0'){
        return false;
    } else {
        return true; //表单未填写
    }
}

function get_random_string($str_len){
    $str = 'abcdefghijklmnopqrstuvwxyz0123456789';
    $shuffled = str_shuffle($str);
    return substr($shuffled, 0, $str_len);
}

function get_csrf_nonce()
{
    $CI =& get_instance();
    $CI->load->helper('string');
    $key = get_random_string(8);
    $value = get_random_string(20);
    $CI->session->set_userdata('csrfkey', $key);
    $CI->session->set_userdata('csrfvalue', $value);

    return [$key => $value];
}

function valid_csrf_nonce()
{
    $CI =& get_instance();
    if ($CI->session->userdata('csrfkey')!='' && $CI->session->userdata('csrfvalue')!='') {
        return TRUE;
    } else {
        return FALSE;
    }
}

function clear_csrf(){
    $CI =& get_instance();
    $CI->session->set_userdata('csrfkey', '');
    $CI->session->set_userdata('csrfvalue', '');
}