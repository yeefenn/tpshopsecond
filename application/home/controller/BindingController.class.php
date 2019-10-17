<?php
namespace application\home\controller;
use framework\core\Controller;
use framework\core\Session;

class BindingController extends Controller{
    public function checkName(){
        config('debug',false);
//        连接数据库，查询单条
        $data=$_GET['user_account'];

//            $data= request()->get('user_account');
//           dump($data);exit;
//            $res=D('user')->where(['user_name'=>$data])->find();
        $reg1="/^([a-zA-Z]|[0-9])(\w|\-)+@[a-zA-Z0-9]+\.([a-zA-Z]{2,4})$/";
        $reg2="/^1[3456789]\d{9}$/";
        if(preg_match($reg1,$data)){
            $res=D('user')->where(['user_email'=>$data])->find();
        }
        if(preg_match($reg2,$data)){
            $res=D('user')->where(['user_phone'=>$data])->find();
        }
        if($res){
            echo json_encode(["status"=>1,"msg"=>"用户账号已注册"]);
        }else{
            echo json_encode(["status"=>0,"msg"=>"可以注册"]);
        }
    }

    //    发送验证码短信
    public function sendCode(){
//        $data= request()->get('user_account');
        config('debug',false);
        $data=$_GET['user_account'];
//        dump($data);
        $reg1="/^([a-zA-Z]|[0-9])(\w|\-)+@[a-zA-Z0-9]+\.([a-zA-Z]{2,4})$/";
        $reg2="/^1[3456789]\d{9}$/";
        $code=rand(1000,9999);
//        dump($code);
        Session::add('code_msg',['code'=>$code,'user_account'=>$data]);
        $userModel=D("User");
        if(preg_match($reg1,$data)){
            $data=$userModel->sendToEmail($data,$code);
//          var_dump($data);
            if($data){
                echo json_encode(['status'=>1,'msg'=>'ok']);
            }else{
                echo json_encode(['status'=>0,'msg'=>'发送失败']);
            }
        }

        if(preg_match($reg2,$data)){
            $data=$userModel->sendToPhone($data,$code);
//          dump($data);
            $arr=json_decode($data,true);
//            var_dump($arr);
            if($arr['success']==1){
                echo json_encode(['status'=>1,'msg'=>'ok']);
            }else{
                echo json_encode(['status'=>0,'msg'=>'发送失败']);
            }
        }
    }
    public function checkCode(){
        config('debug',false);
        $data=$_GET['code'];
        $code=Session::get("code_msg")['code'];
        if($data==$code){
            echo json_encode(['status'=>1,'msg'=>'验证码正确']);
        }else{
            echo json_encode(['status'=>0,'msg'=>'验证码错误']);
        }
    }


}


?>