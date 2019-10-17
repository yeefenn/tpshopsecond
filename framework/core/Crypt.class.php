<?php
namespace framework\core;
class Crypt{
    //md5加密
    public static function md5_crypt($pwd,$sult){
        return md5(md5($pwd).$sult);
    }
    //加密
    public static function encrypt($data){
        $data=json_encode($data);
        return openssl_encrypt($data,"des-ede",config("app_key"));
    }
    //解密
    public static function decrypt($data){
        $data=openssl_decrypt($data,"des-ede",config("app_key"));
        return json_decode($data,true);
    }
}

?>