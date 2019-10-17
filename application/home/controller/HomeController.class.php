<?php
namespace application\home\controller;
use framework\core\Controller;
use framework\core\Session;

class HomeController extends Controller{
    public function home(){
//         取session
        $user_id=Session::get('user')['user_id'];
        $cate_all=Db('cate')->select();
//            $cate_all=$this->select();
        $cate_order=[];
        foreach ($cate_all as $key=>$val){
            if($val['cate_pid']==0){
                foreach ($cate_all as $k=>$v){
                    if($v['cate_pid']==$val['cate_id']){
                        $val['child'][]=$v;
                    }
                }
                $cate_order[]=$val;
            }
        }
//        $ask=Db('ask')->where(['ask_status'=>0])->order('ask_gold  desc')->limit(0,5)->select();
//        生成静态页面
//        $html='index.html';
//        if(!file_exists($html)){
//            Ob_start();
//            file_put_contents("index.html",'');
////            file_put_contents("'APP_RUNTIME_PATH'.static/index.html",'dsdf');
//            Ob_get_contents();
//        }
        if($user_id){
            $arr=Db('user')->where(['user_id'=>$user_id])->find();
            $ask=Db('ask')->where(['ask_status'=>0])->order('ask_gold  desc')->limit(0,5)->select();
            view('user_home',['user_name'=>$arr['user_name'],'user_id'=>$user_id,'cate_order'=>$cate_order,'ask'=>$ask]);
        }else{
//            dump($ask);
            $ask=Db('ask')->where(['ask_status'=>0])->order('ask_gold  desc')->limit(0,5)->select();
            view('',['cate_order'=>$cate_order,'ask'=>$ask]);
        }

    }

    public function cateOrder(){
        $cate_all=Db('cate')->select();
        $cate_order=[];
        foreach ($cate_all as $key=>$val){
            if($val['cate_pid']==0){
                foreach ($cate_all as $k=>$v){
                    if($v['cate_pid']==$val['cate_id']){
                        $val['child'][]=$v;
                        $cate_order[]=$val;
                    }
                }
            }
        }
        dump($cate_order);
    }

    public function ask_num(){

        $data=Db('ask')->order('ask_time',desc)->limit(1)->select();
        dump($data);
        if($data){
            echo json_encode(['staus'=>1,'msg'=>'ok','ask_num'=>2]);
        }
//        SELECT * FROM user ORDER BY id ASC LIMIT 1;
    }

//    生成静态页面
    public function get_static(){
        $html='index.html';
        if(!file_exists($html)){
            Ob_start();

        }
    }

}
?>