<?php
namespace application\home\controller;
use framework\core\Controller;
use framework\core\Cookie;
use framework\core\ErrorException;
use framework\core\Session;

class LoginController extends Controller{
//    验证用户唯一性
    public function checkName(){
          config('debug',false);
//        连接数据库，查询单条
//        $data=$_GET['user_account'];
//        dump($data);exit;
//        if(request()-isGet()){
        $data=$_GET['user_account'];
//            $data= request()->get('user_account');
//            dump($data);
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

    public function register(){
        if ($this->request->isPost()) {
            $data = request()->post();
//            dump($data);
//            入 库
            $user_name=substr(uniqid(),-6);
            $user_gold=config('config_gold');
            $user_exp=config('config_news');
            $sult=substr(uniqid(),-4);
            $user_pwd=md5(md5($data['user_pwd']).$sult);
            $user_account=request()->post['user_account'];
            $user_time=date('Y-m-d H:i:s',time());
//            dump($user_time);
            $reg1="/^([a-zA-Z]|[0-9])(\w|\-)+@[a-zA-Z0-9]+\.([a-zA-Z]{2,4})$/";
            $reg2="/^1[3456789]\d{9}$/";
            $dataModel=D('User');
            if(preg_match($reg1,$data['user_account'])){
                $user_email=$user_account;
                $user=$dataModel->add(['user_name'=>$user_name,'user_pwd'=>$user_pwd,'user_email'=>$user_email,'sult'=>$sult]);
            }
            if(preg_match($reg2,$data['user_account'])){
                $user_phone=$user_account;
                $user=$dataModel->add(['user_name'=>$user_name,'user_pwd'=>$user_pwd,'user_email'=>$user_phone,'sult'=>$sult]);
            }
            if($user){

//                数据库事务功能
                dump("没有成功");
                Db('userinfo')->insert(['user_gold'=>$user_gold,'user_exp'=>$user_exp,'user_time'=>$user_time]);
//             没有成功回滚

            }else{
                throw new ErrorException("插入user表失败");
                $this->error('注册失败');
            }



//            view();
        }

    }
    public function qq_login(){
//        展示qq登录页面
        //获取accessToken
        $url = 'https://graph.qq.com/oauth2.0/authorize';
        $param = ["response_type" => 'code',
            'client_id' => '101706648',
//            暂时不能用
            'redirect_uri' => 'http://localhost/tp/index.php/home/login/qq_callback',
            'state' => "zhangsan"
        ];
        $param = http_build_query($param);
        header("Location:" . $url . "?" . $param);
    }

    public function qq_callback()
    {

//        dump('shuchu');  request()->get("state", "") request()->get("code", "")
        if ($_GET['state'] == "zhangsan") {
//            dump('shuchu');
            $code =$_GET['code']  ;
            $url = 'https://graph.qq.com/oauth2.0/token';
            $param = ['grant_type' => "authorization_code",
                'client_id' => '101706648',
                'client_secret' => '35dce26da88e731775ca72182ced9101',
                'code' => $code,
                'redirect_uri' => 'http://localhost/tp/index.php/home/login/qq_callback'
            ];
            $data = file_get_contents($url . "?" . http_build_query($param));
//            strpos判断字符串首次出现的位置  parse_str — 将字符串解析成多个变量
//          http_build_query— 生成 URL-encode 之后的请求字符串
//            file_get_contents — 将整个文件读入一个字符串
            if (strpos($data, 'access_token') === 0) {
                parse_str($data, $arr);
                $access_token = $arr['access_token'];
                $data = file_get_contents("https://graph.qq.com/oauth2.0/me?access_token=" . $access_token);
//                dump($data);exit;
                preg_match('/^callback\(\s*(\{.*\})\s*\);$/', $data, $arr);
                if (!isset($arr[1])) {
                    throw new ErrorException("非法请求");
                }
                $data = json_decode($arr[1], true);
//                dump($data);exit;
                $url = 'https://graph.qq.com/user/get_user_info?access_token=' . $access_token . '&oauth_consumer_key=101706648&openid=' . $data['openid'];
//               $res =file_get_contents($url);
                $res=json_decode(file_get_contents($url),true);
                $user_name=$res['nickname'];
                $user_face=$res['figureurl_qq'];
//                dump($user_face);exit;
//                  dump($res);
//                dump($res['nickname']);exit;
//                查询Oauth数据表
//               $dataModel=D('Oauth');
//            判断openid是否存在
                $result=Db('Oauth')->where(['openid'=>$data['openid']])->find();
//                dump($result);exit;

//             $result=$dataModel->findOne(['openid'=>$data['openid']]);
//            存在。查询是否绑定
             if($result){
//                 判断user_id是否存在
                 if($result['user_id']){
//                     直接登录,存session和cookie
                     Session::add("user",['user_id'=>$result['user_id']]);
                     Cookie::add("user",['user_id'=>$result['user_id']]);
                     $this->success('登录成功',url('home/home'));
                 }else{
//                     绑定手机号或者邮箱
                     Session::add('openid',['user_name'=>$user_name,'user_face'=>$user_face,'openid'=>$data['openid']]);
                     $this->success('验证成功',url('binding'));
//                     dump("dsfgr");
                 }
             }else{
//               首次第三方登录 openid不在data表，存数据到data表 type暂时都为qq
                 $row1=Db('Oauth')->insert(['openid'=>$data['openid'],'oauth_type'=>'QQ']);
                 Session::add('openid',['user_name'=>$user_name,'user_face'=>$user_face,'openid'=>$data['openid']]);
                 $this->success('验证成功',url('binding'));
             }
            } else {
                throw new ErrorException("非法请求");
            }
        } else {

            throw new ErrorException("非法请求");
        }
    }



//    绑定页
    public function binding(){
//        config('debug',false);

        if (request()->isGet()){
            $data=Session::get('openid');
//            user_name,user_face
//            dump($data);
            view('',['user_name'=>$data['user_name'],'user_face'=>$data['user_face'],'openid'=>$data['openid']]);
        }
        if(request()->isPost()){
            dump(request()->Post());
            $user_account=$_POST['user_account'];
//            $user_account=request()->post(['user_account']);
//            dump($user_account);
            $user_name=$_POST['user_name'];
//            $user_name=request()->post(['user_name']);
//            dump($user_name);
            $user_face=$_POST['user_face'];
            $openid=$_POST['openid'];
            $time=date("Y-m-d H:i:s",time());
            $user_gold=config('config_gold');
            $user_exp=config('config_news');
//            dump($user_face);
            $reg1="/^([a-zA-Z]|[0-9])(\w|\-)+@[a-zA-Z0-9]+\.([a-zA-Z]{2,4})$/";
            $reg2="/^1[3456789]\d{9}$/";
//            dump(request()->Post());
            if(preg_match($reg1,$user_account)){
                $row2=Db('user')->insert(['user_email'=>$user_account,'user_name'=>$user_name,'user_face'=>$user_face]);
//                数据库事务处理
                $row3=Db('user')->where(['user_email'=>$user_account])->find();
                $row4=Db('userinfo')->insert(['user_gold'=>$user_gold,'user_exp'=>$user_exp,'user_id'=>$row3['user_id'],'user_face'=>$user_face,'user_time'=>$time]);
                Db('oauth')->where(['openid'=>$openid])->insert(['user_id'=>$row3['user_id']]);
            }
            if(preg_match($reg2,$user_account)){
                $row2=Db('user')->insert(['user_phone'=>$user_account,'user_name'=>$user_name,'user_face'=>$user_face]);
                $row3=Db('user')->where(['user_phone'=>$user_account])->find();
                $row4=Db('userinfo')->insert(['user_gold'=>$user_gold,'user_exp'=>$user_exp,'user_id'=>$row3['user_id'],'user_face'=>$user_face,'user_time'=>$time]);
//                dump($row3);
                Db('oauth')->where(['openid'=>$openid])->update(['user_id'=>$row3['user_id']]);
//                exit;
            }
            if($row2){
//                存Session
                Session::add("user",['user_id'=>$row3['user_id']]);
                Cookie::add("user",['user_id'=>$row3['user_id']]);
                $this->success('绑定成功',url('home/home'));
            }
//            dump($row2);

        }


    }


//    登录
    public function login_do(){
        view();
    }
    public function checkPwd(){
        config('debug',false);
        $data=$_GET['user_pwd'];
        $user_pwd=

        $res=Db('user')->where(['user_pwd'=>$data])->find();
        if($res){
            echo json_encode(['status'=>1,'msg'=>'ok']);
        }else{
            echo json_encode(['status'=>0,'msg'=>'no']);
        }

    }

}

?>