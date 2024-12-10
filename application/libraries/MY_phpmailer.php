<?php defined('BASEPATH') OR exit('No direct script access allowed.');

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
class MY_phpmailer {

	public function __construct(){
        //
	}

    public function load(){

        $mail = new PHPMailer(true);
        $mail->IsSMTP();
        $mail->IsHTML(true);
        $mail->SMTPAuth = true;
        $mail->SMTPSecure = get_setting_general('smtp_crypto');
        $mail->Host = get_setting_general('smtp_host');
        $mail->Port = get_setting_general('smtp_port');
        $mail->CharSet = "utf-8";
        $mail->Username = get_setting_general('smtp_email');
        $mail->Password = get_setting_general('smtp_password');
        $mail->From = get_setting_general('smtp_email');
        $mail->FromName = get_setting_general('smtp_forname');
        return $mail;

        // $mail->AddAddress($to); //設定收件者郵件
        // $mail->Subject = $subject; //設定郵件標題
        // $mail->Body = $body; //設定郵件內容
        // // $mail->Send();

        // if(!$mail->Send()){
        //     // echo "Error: " . $mail->ErrorInfo;
        //     return 0;
        // } else {
        //     // echo "<b>您好!已收到您的留言，會盡快回覆</b>";
        //     return 1;
        // }
    }

    public function send($to, $subject, $body){

        $mail = new PHPMailer(true);
        $mail->IsSMTP();
        $mail->IsHTML(true);
        $mail->SMTPAuth = true;
        $mail->SMTPSecure = get_setting_general('smtp_crypto');
        $mail->Host = get_setting_general('smtp_host');
        $mail->Port = get_setting_general('smtp_port');
        $mail->CharSet = "utf-8";
        $mail->Username = get_setting_general('smtp_email');
        $mail->Password = get_setting_general('smtp_password');
        $mail->From = get_setting_general('smtp_email');
        $mail->FromName = get_setting_general('smtp_forname');

        $mail->AddAddress($to); //設定收件者郵件
        $mail->Subject = $subject; //設定郵件標題
        $mail->Body = $body; //設定郵件內容
        // $mail->Send();

        if(!$mail->Send()){
            // echo "Error: " . $mail->ErrorInfo;
            return 0;
        } else {
            return 1;
        }
    }

}