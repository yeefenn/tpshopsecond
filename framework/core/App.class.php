<?php
namespace framework\core;

class App{
    private static $obj;
//    使用注册树模式将需要的对象插在$obj属性上
    public static function set($name,$className){
        $class="\\framework\\core\\".$className;
        if(!isset(self::$obj[$name])){
            self::$obj[$name]=new $class();
        }
    }
//    单例模式加注册树模式
    public static function get($name){
        if(isset(self::$obj[$name])){
            return self::$obj[$name];
        }
        return null;
    }
    public static function run(){

        //        设置错误处理
        self::setErrorHandler();
        self::set("debug","Debug");
        self::get("debug")->start();

//        echo "我被执行了";
//        定义框架的目录
        self::initFrameworkPath();
//        定义项目的目录
        self::initAppPath();
//        自动生成项目的目录结构
        self::creatAPP();
       //加载框架的配置文件
        self::loadFrameworkConfig();
        //加载框架的助手函数文件
        self::loadFrameworkFunction();
//        加载项目的配置
        self::loadAppConfig();
        //引入项目的自定义函数
        self::loadAppFunction();
//        生成默认的模块
        self::createDefaultModule();
//        验证csrf攻击
        self::set("request","Request");
        self::get("request")->validate_csrf();
        //初始化路由
        self::set("route","Route");
        self::get("route")->init();
 //  加载模块的配置文件，
        self::loadModuleConfig();
//       加载模块的自定义函数
        self::loadModuleFunction();
//        开启session
        self::startSession();
//        分发路由
        self::get("route")->dispense();

//        取debug
        self::get("debug")->end();
    }
//    定义框架的目录
    public static function initFrameworkPath(){
        define("FRAMEWORK_COMMON_PATH",FRAMEWORK_PATH."common/");
        define("FRAMEWORK_CONFIG_PATH",FRAMEWORK_PATH."config/");
        define("FRAMEWORK_CORE_PATH",FRAMEWORK_PATH."core/");
    }
//    定义项目的目录
    public static function initAppPath(){
        define("APP_COMMON_PATH",APP_PATH."common/");
        define("APP_CONFIG_PATH",APP_PATH."config/");
        define("APP_RUNTIME_PATH",APP_PATH."runtime/");
    }
//自动生成项目
    public static function creatAPP(){
        if(!file_exists(APP_PATH)) mkdir(APP_PATH,true,0777);
        if(!file_exists(APP_COMMON_PATH)) mkdir(APP_COMMON_PATH,true,0777);
        if(!file_exists(APP_RUNTIME_PATH)) mkdir(APP_RUNTIME_PATH,true,0777);
        if(!file_exists(APP_CONFIG_PATH)) mkdir(APP_CONFIG_PATH,true,0777);
        if(!file_exists(APP_CONFIG_PATH."app.php")) {
//            touch(APP_CONFIG_PATH."config.php");
            $data=<<<ETC
<?php
      return [
      
      ];
?>
ETC;
            file_put_contents(APP_CONFIG_PATH."app.php",$data);
        }
    }
    //加载框架的配置文件
    public static function loadFrameworkConfig(){
        global $config;
        if(file_exists(FRAMEWORK_CONFIG_PATH."config.php")){
            $config=require_once(FRAMEWORK_CONFIG_PATH."config.php");
        }
    }
//    加载项目的配置
    public static function loadAppConfig(){
        global $config;
        $dir=scandir(APP_CONFIG_PATH);
        foreach($dir as $key=>$val){
            if($val!='.' && $val!=".."){
                if(substr($val,-4)===".php"){
                    $config=array_merge($config,[require_once(APP_CONFIG_PATH.$val)]);
                    self::get("debug")->file[]=APP_CONFIG_PATH.$val;
                }
            }
        }
    }
    //加载框架的助手函数文件
    public static function loadFrameworkFunction(){
        if(file_exists(FRAMEWORK_COMMON_PATH.'function.php')){
            require_once(FRAMEWORK_COMMON_PATH.'function.php');
        }
    }
    //引入项目的自定义函数
    public static function loadAppFunction(){
        if(file_exists(APP_COMMON_PATH."function.php")){
            require_once APP_COMMON_PATH."function.php";
        }
    }
    //生成默认的模块
    public static function createDefaultModule(){
        //定义模块的路径
        $default_module_path=APP_PATH.strtolower(config('default_module'))."/";
        $default_module_name=strtolower(config('default_module'));
        if(!is_dir($default_module_path))mkdir($default_module_path,true,0777);
        if(!is_dir($default_module_path."common"))mkdir($default_module_path."common",true,0777);
        if(!is_dir($default_module_path."config"))mkdir($default_module_path."config",true,0777);
        if(!is_dir($default_module_path."controller"))mkdir($default_module_path."controller",true,0777);
        if(!is_dir($default_module_path."model"))mkdir($default_module_path."model",true,0777);
        if(!is_dir($default_module_path."view"))mkdir($default_module_path."view",true,0777);
        $default_controller_path=$default_module_path."controller/".ucfirst(strtolower(config("default_controller"))).'Controller.class.php';
        $default_controller_name=ucfirst(strtolower(config("default_controller")))."Controller";
        $default_action_name=strtolower(config('default_action'));
        if(!file_exists($default_controller_path)){
            $data= <<< EOF
<?php
    namespace application\home\controller;
    use framework\core\Controller;
    class IndexController extends Controller{
        public function $default_action_name(){
            echo "<div style='font-size:150px;font-weight:bold;'>:)</div><div style='font-size:30px;font-weight:bold;'>欢迎使用自定义tp</div>";
        }
    }
?>
EOF;
            file_put_contents($default_controller_path,$data);
        }
    }
//    加载模块的函数
    public static function loadModuleFunction(){
        if(file_exists(MODULE_PATH."common/function.php")){
            require_once (MODULE_PATH."common/function.php");
        }

    }
//加载模块的配置文件
    public static function loadModuleConfig(){
        global $config;
        if(is_dir(MODULE_PATH."config")){
            $dir=scandir(MODULE_PATH."config");
            foreach ($dir as $k=>$v){
                if($v != "." && $v !=".."){
                    if(substr($v,-4)===".php"){
                        $config=array_merge($config,require_once (MODULE_PATH."config/".$v));
                    }
                }
            }
        }
    }
//    设置框架的错误处理机制
     public static function setErrorHandler(){
        ini_set("display_error",0);
        error_reporting(E_ALL);
         set_error_handler(["\\framework\\core\\Error","errorHandler"]);
         set_exception_handler([new\framework\core\ErrorException(),"exceptionHandler"]);
     }
//     开启session
     public static function startSession(){
        if(config("auto_start")){
            Session::start();
        }
     }

}


?>