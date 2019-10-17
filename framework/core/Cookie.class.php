<?php
namespace framework\core;
class Cookie{
    //判断cookie是否存在
    public static function has($name){
        if(isset($_COOKIE[$name])){
            return true;
        }else{
            return false;
        }
    }
    //存cookie
    public static function add($name,$value='',$time=0,$path='',$domain=''){
        //存临时
        if($time===0){
            return setcookie($name,Crypt::encrypt($value),0,$path,$domain);
        }
        //存长久
        return setcookie($name,Crypt::encrypt($value),time()+$time,$path,$domain);

    }
    //取cookie
    public static function get($name){
        if(!isset($_COOKIE[$name])) return null;
        return Crypt::decrypt($_COOKIE[$name]);
    }
    //删除cookie
    public static function delete($name){
        if(!isset($_COOKIE[$name])) return null;
        return setcookie($name,null,time()-1,$path,$domain);
    }
}




?>
