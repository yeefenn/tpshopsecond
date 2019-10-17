<?php
namespace application\admin\controller;
use framework\core\View;
use application\admin\model\Admin;
use framework\core\Controller;
use framework\core\Captcha;
use framework\core\Cookie;
use framework\core\Model;
use framework\core\Session;
use framework\core\Validate;
class LoginController extends Controller{
    public function login()
    {

        if ($this->request->isGet()) {
            view();
        }
        if ($this->request->isPost()) {
//            echo "sss";exit;
            //接值
            $admin_name = request()->post("admin_name", "");
//            echo "sss";exit;
            $admin_pwd = $this->request->post("admin_pwd", "");
            $code = $this->request->post("code", "");
//            if (!Captcha::checkCode($code)) {
//                $this->error("验证码错误");
//            }
            if (Validate::empty($admin_name)) $this->error("用户名能不能为空");
            if (Validate::empty($admin_pwd)) $this->error("密码能不能为空");
            if (!Validate::regx('/^[a-z]{5,15}$/', $admin_name)) $this->error("用户名5-15位小写字母");
            // 查询
//            操作数据库
           if( D("admin")->login($admin_name,$admin_pwd)){
               $this->success("登录成功",url('show'));
           }else{
               $this->error("登录失败");
           }
        }
    }
    public function show(){

        view();
    }
    public function welcome(){
        view();
    }

    public function code(){
        $captcha=new Captcha($width=100, $height=30);
        $captcha->outimg();
    }
    public function logout(){

    }

}
?>