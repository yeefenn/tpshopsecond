<?php
use framework\core\App;
//自动加载路径
class Autoload{
    public static function loadClass($class){
        $class_path=BASE_PATH.str_replace("\\","/",$class).".class.php";
        if(file_exists($class_path)){
            require_once  $class_path;
           App::get("debug")->file[]=$class_path;
        }else{
            throw new \framework\core\ErrorException($class_path."文件不存在");
//            exit($class_path."类文件不存在");
        }
    }
}
//把方法变成自动加载的方法
spl_autoload_register(["Autoload","loadClass"]);


?>