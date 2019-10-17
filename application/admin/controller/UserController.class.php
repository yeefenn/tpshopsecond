<?php
namespace application\admin\controller;
use framework\core\Controller;

class UserController extends Controller{
    public function index(){
//        查询user表和userinfo表
        $user=Db('user')->order('user_id  desc')->select();
//      dump($user);
        foreach ($user as $k=>$v){
            $userinfo=Db('userinfo')->where(['user_id'=>$v['user_id']])->find();
//            dump($userinfo);
           $user[$k]=array_merge($v,$userinfo);
        }
//        dump($user);exit;
        view('',['user'=>$user]);
    }
    public function changeStatus(){
        if(request()->isGet()){
            config('debug',false);
            $data=request()->get();
//            dump($data);
//            修改状态
            if($data['user_status']==1){
                $res=Db('user')->where(['user_id'=>$data['user_id']])->update(['user_status'=>0]);
            }
            if($data['user_status']==0){
                $res=Db('user')->where(['user_id'=>$data['user_id']])->update(['user_status'=>1]);
            }
            if($res){
                echo json_encode(['status'=>1,'msg'=>'ok']);
            }else{
                echo json_encode(['status'=>1,'msg'=>'non']);
            }
        }
    }
//   更改用户名
    public function changeName(){
        if(request()->isGet()){
            config('debug',false);
            $data=request()->get();
//            dump($data);
            $res=Db('user')->where(['user_id'=>$data['user_id']])->update(['user_name'=>$data['user_name']]);
            if($res){
                echo json_encode(['status'=>1,'msg'=>'ok']);
            }else{
                echo json_encode(['status'=>0,'msg'=>'non']);
            }
        }
    }
//    搜索分页
    public function Search(){
        config('debug',false);
        if(request()->isPost()){
            $data=request()->post();
//            dump($data);
            $where= 1;
            $user_phone=$data['user_phone']?$data['user_phone']:'';
            $user_email=$data['user_email']?$data['user_email']:'';
            $user_status=$data['user_status']?$data['user_status']:'';
//            dump($user_email);
//            dump($user_phone);
            if($user_phone!=''){
                $where.=" and user_phone like '%".$user_phone."% '";
            }
            if($user_email!=''){
                $where.=" and user_email like '%".$user_email."% '";
            }
            if($user_status!='-1'){
                $where.=" and user_status =".$user_status;
            }
            $user=Db('user')->where($where)->order('user_id  desc')->select();
            foreach ($user as $k=>$v){
                $userinfo=Db('userinfo')->where(['user_id'=>$v['user_id']])->find();
                $user[$k]=array_merge($v,$userinfo);
            }
//            dump($user);
            if($user){
                echo json_encode(['status'=>1,'msg'=>'ok','user'=>$user]);
//                if($user==''){
//                    echo json_encode(['status'=>0,'msg'=>'无数据']);
//                }else{
//                    echo json_encode(['status'=>1,'msg'=>'ok','user'=>$user]);
//                }
            }else{
                echo json_encode(['status'=>0,'msg'=>'无数据']);
//                echo json_encode(['status'=>-1,'msg'=>'no']);
            }
        }

    }



}


?>