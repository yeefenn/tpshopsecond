<?php
namespace framework\core;
class Session{
    //开启session
    public static function start(){
        return session_start();
    }
    //判断session是否存在
    public static function has($name){
        if(isset($_SESSION[$name])){
            return true;
        }else{
            return false;
        }
    }
    //存session
    public static function add($name,$value=''){
        return $_SESSION[$name]=Crypt::encrypt($value);
    }
    //取session
    public static function get($name,$value=''){
        if(!isset($_SESSION[$name])){
            return null;
        }else{
            //return $_SESSION[$name];
            return Crypt::decrypt($_SESSION[$name]);
        }
    }
    //删除session
    public static function delete($name=null,$value=''){
        if($name===null){
            return session_destroy();
        }
        if(!isset($_SESSION[$name])){
            return null;
        }else{
            unset($_SESSION[$name]);
            return true;
        }
    }

}
?>




