<?php
//取配置文件里的参数
function config($name=null,$value=null){
    global $config;
    if($name===null){
        return $config;
    }
    if($value===null){
        return $config[$name];
    }
    $config[$name]=$value;
}
function view($path="",$data=null){
    $view=new \framework\core\View();
    if(is_array($data)){
        foreach($data as $key=>$val){
            $view->assign($key,$val);
        }
    }
//    dump($view);
    $view->display($path);
}

function request()
{
    return \framework\core\App::get("request");
}
//接值函数
function input($name,$default=null,$func=null){
    $name=explode(".",$name);
    if(strtolower($name[0]==='get')){
        if(empty($name[1])){
            return request()->get();
        }else{
            return request()->get($name[1],$default,$func);
        }
    }
    if(strtolower($name[0])==="post"){
        if(empty($name[1])){
            return request()->post();
        }else{
            return request()->post($name[1],$default,$func);
        }
    }

}
//数据库
    function Db($table=null){
        $db=\framework\core\Model::instance();
        if(!empty($table)){
            $db->table($table);
        }
        return $db;
    }

//    使用php的反射机制
//    php系统自带的反射类ReflectionClass
//操作模型层
    function D($model_name){
        $class_name="\\application\\".MODULE_NAME."\\model\\".ucfirst(strtolower($model_name));
        $reflection=new \ReflectionClass($class_name);
        $obj=$reflection->newInstanceWithoutConstructor();
        $obj->setConfig();
        $obj->connect();
        $properties=$reflection->getDefaultProperties();
        if (is_null($properties['table'])){
            $obj->table($model_name);
        }
        return $obj;
    }
function token(){
    return "<input name='_token' type='hidden' value=' ".request()->token()."'>";
}
//url地址
function url($path=null,$param=[]){
    return request()->url($path,$param);
}
//打印
function dump($data){
    echo "<pre>";
    print_r($data);
    echo "</pre>";

}
//    加载模板函数
function resource($path=null){
    $request = \framework\core\App::get("request");
    $url=$request->server->request_scheme."://".$request->server->server_name.$request->server->script_name;
    if($path===null){
        return dirname($url)."/public/";
    }else{
        $path=ltrim($path,"/");
        return dirname($url)."/public/".$path;
    }


}

