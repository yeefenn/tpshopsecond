<?php
namespace framework\core;
//use framework\core\smarty\Smarty;
class View{
//    use framework\core\smarty\Smarty;
    public $smarty;
    public function __construct()
    {
//        define("VIEW_PATH",APP_PATH.MODULE_NAME."/view/");
        require_once(FRAMEWORK_CORE_PATH."smarty/Autoloader.php");
        App::get("debug")->file[]=FRAMEWORK_CORE_PATH."smarty/Autoloader.php";
        require_once(FRAMEWORK_CORE_PATH."smarty/bootstrap.php");
        App::get("debug")->file[]=FRAMEWORK_CORE_PATH."smarty/bootstrap.php";
        $this->smarty=new \Smarty();
//        var_dump($this->smarty);exit;
        $this->smarty->setTemplateDir("VIEW_PATH");
        $this->smarty->setCompileDir(APP_RUNTIME_PATH.MODULE_NAME."/".CONTROLLER_NAME);

        $this->smarty->left_delimiter="<{";
        $this->smarty->right_delimiter="}>";
    }
//    给模板分配变量
    public function  assign($name,$data){
        $this->smarty->assign($name,$data);

    }
//显示模板
    public function display($html_path=null){
        $html_path=$this->dealViewPath($html_path);
        $html_path=$html_path.".".config('view_suffix');
        $html_path=MODULE_PATH."view/".$html_path;
//        var_dump($html_path);
        if(!file_exists($html_path)){
            throw new ErrorException($html_path."模板不存在");
        }
        $this->smarty->display($html_path);
        App::get("debug")->file[]=$html_path;



    }
//    处理模板的路径
    public function dealViewPath($tpl_path){
        if(is_string($tpl_path)){
            $tpl_path=trim($tpl_path,"/");
        }
        if(empty($tpl_path)){
            $tpl_path=strtolower(CONTROLLER_NAME)."/".ACTION_NAME;

        }else{
            $tplArr=explode("/",$tpl_path);
            if(count($tplArr)==1){
                $tpl_path=strtolower(CONTROLLER_NAME)."/".$tplArr[0];
            }
        }
        return $tpl_path;
    }
}

?>