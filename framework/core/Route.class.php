<?php
//初始化路由
namespace framework\core;
class Route{
    public $path_info;
    public function init(){
        $this->path_info=isset($_SERVER['PATH_INFO']) ? trim($_SERVER['PATH_INFO'],"/"): "";
        //初始化模块
        $this->initMoudleRoute();
        //初始化控制器
        $this->initControllerRoute();
        //初始化方法
        $this->initActionRoute();
//        初始化属性
        $this->initParam();
    }
    //初始化模块
    public function initMoudleRoute(){
        if($this->path_info){
            $this->path_info=explode("/",$this->path_info);
            if(isset($this->path_info[0]) && !empty($this->path_info[0])){
                define("MODULE_NAME",strtolower($this->path_info[0]));
            }else{
                define("MODULE_NAME",strtolower(config("default_module")));
            }
        }else{
            define("MODULE_NAME",strtolower(config("default_module")));
        }
        define("MODULE_PATH",APP_PATH.MODULE_NAME."/");
        if(!is_dir(MODULE_PATH)){
            throw new ErrorException("没有这个".MODULE_NAME."模块");

        }
    }
    //初始化控制器
    public function initControllerRoute(){
        if($this->path_info){
            $this->path=explode("/",'$this_path');
            if(isset($this->path_info[1]) && !empty($this->path_info[1])){
                define("CONTROLLER_NAME",ucfirst(strtolower($this->path_info[1])));
            }else{
                define("CONTROLLER_NAME",ucfirst(strtolower(config("default_controller"))));
            }
        }else{
            define("CONTROLLER_NAME",ucfirst(strtolower(config("default_controller"))));
        }
        define("CONTROLLER_PATH",APP_PATH.CONTROLLER_NAME."/");
    }
    //初始化方法
    public function initActionRoute(){
        if($this->path_info){
            $this->path=explode("/",'$this_path');
            if(isset($this->path_info[2]) && !empty($this->path_info[2])){
                define("ACTION_NAME",strtolower($this->path_info[2]));
            }else{
                define("ACTION_NAME",strtolower(config("default_action")));
            }
        }else{
            define("ACTION_NAME",strtolower(config("default_action")));
        }
        define("ACTION_PATH",APP_PATH.ACTION_NAME."/");
    }
//    初始化属性
    public function initParam(){
        $path_info=isset(request()->server->path_info)?request()->server->path_info:"";
        $path_info=trim($path_info,"/");
        if(!empty($path_info)){
            $path_arr=explode("/", $path_info);

            if(count($path_arr)>3){
                array_shift($path_arr);
                array_shift($path_arr);
                array_shift($path_arr);
                foreach ($path_arr as $key => $val) {
                    if($key%2==0){
                        request()->get[$val]=isset($path_arr[$key+1])?$path_arr[$key+1]:null;
                    }
                }
            }
        }
    }

    //分发路由
    public function dispense(){
        $class_name="\\application\\".MODULE_NAME."\\controller\\".CONTROLLER_NAME."Controller";
        //var_dump($class_name);
        $class_name=new $class_name;
        $action_name=ACTION_NAME;
        if(method_exists($class_name,$action_name)){
            $class_name->$action_name();
        }else{
            throw new ErrorException($action_name."方法不存在");
        }
    }



}