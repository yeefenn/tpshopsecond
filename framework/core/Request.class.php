<?php
namespace framework\core;
class Request{
    public $server;
    public $get;
    public $post;
    public $param;
    public $token;
    public function  __construct()
    {
//        对$server赋值
//         stdclass是php中预定义的几个类之一。实际上它就是就是一个空白类，在这个类里面没有任何的类成员，但是可以实例化它，
//然后自己定义一系列的变量，通过它来完成变量传递（很多php程序员用它来传递一系列变量的值，而同时又懒得去创建一个自己的类）。
//但其实例化后不能添加方法，只能传递属性，凡是用new stdClass()的变量，都不会出现$obj->test()这种方式的使用
        $this->server=new \stdClass();
        foreach($_SERVER as $k=>$v){
            $k=strtolower($k);
            $this->server->$k=$v;
        }
//        对post赋值
        $this->post=$_POST;
//        对get赋值
        $this->get=$_GET;
//        对param赋值
        $this->param=$_REQUEST;
    }
    public function isGet(){
        if($this->server->request_method === "GET"){
            return true;
        }
        return false;
    }
    public function isPost(){
        if($this->server->request_method === "POST"){
            return true;
        }
        return false;
    }
//    接post方式提交过来的值
    public function post($name = null, $default = null, $func = null)
    {
        if ($name === null) {
            //            default_filter过滤函数
            //                array_map将用户自定义函数作用到数组中的每个值上，并返回用户自定义函数作用后的带有新值的数组。
            $default_filter = config("default_filter");
            $default_filter = explode(",", $default_filter);
            foreach ($default_filter as $k => $v) {
                $this->post = array_map($v, $this->post);
            }
            return $this->post;
        }
        if (isset($this->post[$name])) {
            if ($func === null) {
                $default_filter = config("default_filter");
                $default_filter = explode(",", $default_filter);
                foreach ($default_filter as $k => $v) {
                    $this->post[$name] = $v($this->post[$name]);
                }
                return $this->post[$name];
            } else {
                return $func($this->post[$name]);
            }
        } else {
            return $default;
        }
    }

//    接get方式提交过来的值
    public function get($name=null, $default=null, $func=""){
        if($name===null){
//            default_filter过滤函数
            $default_filter_arr=explode(",",config("default_filter"));
            foreach($default_filter_arr as $k=>$v){
//                array_map将用户自定义函数作用到数组中的每个值上，并返回用户自定义函数作用后的带有新值的数组。
                $this->get=array_map($v,$this->get);
            }
            return $this->get;
        }
//        return $this->get;
        if(isset($this->get[$name])){
            if($func===null){
                $default_filter_arr=explode(",",config("default_filter"));
                foreach($default_filter_arr as $k=>$v){
//                array_map将用户自定义函数作用到数组中的每个值上，并返回用户自定义函数作用后的带有新值的数组。
                    $this->get[$name]=$v[$this->get[$name]];
                }
                return $this->get[$name];
            }else{
                return $func($this->get[$name]);
            }
        }else{
            return $default;
        }
    }
//    接收所有方式提交过来的值
    public function param($name=null,$default=null,$func=""){
//        $param=$_REQUEST;
        if($name===null){
            $default_filter_arr=explode(",",config("default_filter"));
            foreach($default_filter_arr as $k=>$v){
                $this->param=array_map($v,$this->param);
            }
            return $this->param;
        }
//        return $this->param;
        if(isset($this->param[$name])){
            if($func===null){
                $default_filter_arr=explode(",",config("default_filter"));
                foreach($default_filter_arr as $k=>$v){
//                array_map将用户自定义函数作用到数组中的每个值上，并返回用户自定义函数作用后的带有新值的数组。
                    $this->param[$name]=$v[$this->param[$name]];
                }
                return $this->param[$name];
            }else{
                return $func($this->param[$name]);
            }
        }else{
            return $default;
        }
    }

    //生成url地址
    public function url($path = null, $param = [])
    {
        $domain = $this->server->request_scheme . "://" . $this->server->server_name . $this->server->script_name;
        if (is_string($path)) {
            $path = trim($path, "/");
        }
        if (empty($path)) {
            $url= $domain . "/" . MODULE_NAME . "/" . CONTROLLER_NAME . "/" . ACTION_NAME;
        } else {
            $path_arr = explode("/", $path);
            if (count($path_arr) === 1) {
                $url= $domain . "/" . MODULE_NAME . "/" . CONTROLLER_NAME . "/" . $path_arr[0];
            }
            if (count($path_arr) === 2) {
                $url= $domain . "/" . MODULE_NAME . "/" .$path_arr[0] . "/" . $path_arr[1];
            }
            if (count($path_arr) === 3) {
                $url= $domain . "/" . $path_arr[0] . "/" . $path_arr[1] . "/" . $path_arr[2];
            }
        }
        if(empty($param)){
            return strtolower($url);
        }else{
            $param_str="";
            foreach($param as $k=>$v){
                $param_str.="/".$k."/".$v;
            }
            return strtolower($url.$param_str);
        }
    }
////    验证csrf攻击
    public function validate_csrf(){
        if(config("csrf_validate")){
              if(request()->isPost()){
                  $session_token=Session::get("_token");
                  $input_token=request()->post("_token",null);
                  //        删除token
                  Session::delete("_token");
                  unset(request()->post['_token']);
                  if ($session_token && $input_token){
                      if ($session_token!==$input_token){
                          throw new ErrorException("csrf验证不通过");
                      }
                  }else{
                      throw new ErrorException("请验证csrf令牌");
                  }
              }

        }

    }
    public function token(){
        $this->token=md5(uniqid());
        Session::add("_token", $this->token);
        return $this->token;
    }
}



?>