<?php
namespace application\admin\model;
use framework\core\Session;
use framework\core\Model;
class Admin extends Model{
//    模型数据表名不一致的时候使用
//    public $table="admin";
    public function login($admin_name,$admin_pwd){
//        echo "sdad";
    $admin= $this->field(["admin_id","admin_name"])->where(["admin_name"=>$admin_name,"admin_pwd"=>$admin_pwd])->find();
       if($admin){
           $res=Session::add("admin",$admin,0,"/");
           return true;
       }else{
           return false;
       }
    }

}


?>