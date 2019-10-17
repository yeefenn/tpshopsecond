<?php
namespace framework\core;
class Validate{
    //判断不为空
    public static function empty($data){
        if(!empty($data)){
            return false;
        }else{
            return true;
        }
    }
    //判断长度
    public static function regx($reg,$data){
        if(preg_match($reg,$data)){
            return true;
        }else{
            return false;
        }
    }
    public static function comfirm($pwd,$repwd){
        if($pwd===$repwd){
            return true;
        }else{
            return false;
        }
    }

}




?>