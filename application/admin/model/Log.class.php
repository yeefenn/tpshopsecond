<?php
namespace application\admin\model;
use framework\core\Cookie;
use framework\core\Model;
use framework\core\Session;

class Log extends Model{
    public function add($log_content){
        $admin=Session::get('admin');
        $time=time();
        $log_time=date('Y-m-d H:i:s',$time);
        return $this->insert(['log_content'=>$log_content,'log_time'=>$log_time,'admin_name'=>$admin['admin_name'],'admin_id'=>$admin['admin_id']]);
    }
}


?>