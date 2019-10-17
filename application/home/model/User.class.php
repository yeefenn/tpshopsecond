<?php
namespace application\home\model;
use framework\core\Curl;
use framework\core\Model;

class User extends Model{
    public function sendToPhone($user_phone,$code){
//        dump($user_phone);
//        dump($code);
        $params=[
            "tempid"=>51749,
            "param"=>urlencode('web=自定义&code='.$code),
            "phone"=>$user_phone,
            "appkey"=>45373,
            "sign"=>"e8b8bf90da0918e6c2064b00e14bb9f3",
            "format"=>"json"
        ];
       $data=Curl::postUrl("http://api.k780.com?app=sms.send",$params);
//       var_dump($data);
       return $data;
    }
    public function sendToEmail($user_email,$code){
        require_once (FRAMEWORK_CORE_PATH."PHPMailer/class.phpmailer.php");
        $mail=new \PHPMailer();
//        print_r($mail);exit;
        /*服务器相关信息*/
        $mail->IsSMTP();                        //设置使用SMTP服务器发送
        $mail->SMTPAuth   = true;               //开启SMTP认证
        $mail->Host       = "smtp.163.com";        //设置 SMTP 服务器,自己注册邮箱服务器地址
        $mail->Username   = "ye1301714937";      //发信人的邮箱名称
        $mail->Password   = "1593572486ya";          //发信人的邮箱密码
        /*内容信息*/
        $mail->IsHTML(true);                  //指定邮件格式为：html/text
        $mail->CharSet    ="UTF-8";               //编码
        $mail->From       = "ye1301714937@163.com";          //发件人完整的邮箱名称
        $mail->FromName   = "ye";          //发信人署名
        $mail->Subject    = "test";          //信的标题
        $mail->MsgHTML("你的验证码是:".$code);             //发信主体内容
        //接收邮件的地址
        $mail->AddAddress($user_email);
        $data=$mail->Send();
//        var_dump($data);
        return $data;

    }
    public function add($data){
        return $this->insert($data);
    }




}


?>