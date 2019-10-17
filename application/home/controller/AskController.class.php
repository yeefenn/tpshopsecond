<?php
namespace application\home\controller;
use framework\core\Controller;
use framework\core\Session;

class AskController extends Controller{
    public function show(){
        $user_id=Session::get('user')['user_id'];
//        查询所有顶级分类
       $res=Db('cate')->where(['cate_pid'=>0])->select();
//       dump($res);exit;
        if($user_id){
             $arr1=Db('user')->where(['user_id'=>$user_id])->find();
             $arr2=Db('userinfo')->where(['user_id'=>$user_id])->find();
             view('user_show',['res'=>$res,'user_name'=>$arr1['user_name'],'user_gold'=>$arr2['user_gold'],'user_id'=>$user_id]);
        }else{
            view('',['res'=>$res]);
        }

    }
    public function findSon(){
        if(request()->isGet()){
            config('debug',false);
            $data=$_GET['cate_id'];
//            dump($data);
//            查询对应的子分类
            $res=Db('cate')->field('cate_name')->where(['cate_pid'=>$data])->select();
            if($res){
                echo json_encode(['status'=>1,'msg'=>'ok','cate_name'=>$res]);
            }else{
                echo json_encode(['status'=>0,'msg'=>'no']);
            }
        }
    }
    public function add(){
        if(request()->isPost()){
//            reward 奖励金币
//            content 问题内容
//            cid 问题cate_id
//            user_id用户id
        $data=$_POST;
//            dump($data);
        $res=Db('userinfo')->where(['user_id'=>$data['user_id']])->find();
        $result=Db('userinfo')->where(['user_id'=>$data['user_id']])->update(['user_gold'=>($res['user_gold']-$data['reward']),
            'user_exp'=>($res['user_exp']+5),'ask_num'=>($res['ask_num']+1)]);
        $time=date('Y-m-d H:i:s',time());

        Db('ask')->insert(['ask_content'=>$data['content'],'ask_time'=>$time,'ask_gold'=>$data['reward'],'user_id'=>$data['user_id'],'cate_id'=>$data['cid']]);
//        事务处理
            if($result){
                $this->success('提交成功',url('home/home'));
            }


        }
    }

    public function answer(){
        if($this->request->isGET()){
//            user_id回答人id
            $user_id=(Session::get('user'))['user_id'];
            $user_name=(Db('user')->where(['user_id'=>$user_id])->find())['user_name'];
            $data=request()->get();
//            $data里面为问题信息
//            查问题
            $res=Db('ask')->where(['ask_id'=>$data['ask_id']])->find();
//            查找问题分类链
            $cate_all=Db('cate')->select();
//            dump($cate_all);
            $cate=Db('cate')->where(['cate_id'=>$res['cate_id']])->find();
//            dump($cate);
            $arr=$this->Cateline($cate_all,$cate);
//           $arr=D('cate')->Cateline($cate);
            $arr=array_reverse($arr);
            array_push($arr,$cate);
//            dump($arr);exit;
            $level=config('level');
            $ask_exp=Db('userinfo')->where(['user_id'=>$res['user_id']])->find();
//            dump($ask_exp);exit;
            foreach ($level as $k=>$val){
                if ($val>$ask_exp['user_exp']){
                    $ask_level=$k;
                }
            }
//            ask_user提问人信息
            $ask_user=Db('user')->where(['user_id'=>$res['user_id']])->find();
//            查所有回答
            $answer=Db('answer')->where(['ask_id'=>$data['ask_id']])->select();
            $count=Db('answer')->where(['ask_id'=>$data['ask_id']])->count();
            if(!$answer){
//                $answer[]['answer_content']='快来抢第一个回答问题的超级答题王吧';
//                $answer[]['answer_time']='---';
//                ,'answer_face'=>" '' "
//                dump($answer);exit;
                $answer[]=['answer_content'=>'快来抢第一个回答问题的超级答题王吧','answer_time'=>'-----',
                    'answer_face'=>" <{<{resource()}>index/Images/profile_avatar.jpg "];
//                $answer_face="<{<{resource()}>index/Images/profile_avatar.jpg";
            }else{
                foreach ($answer as $key=>$val){
                    $answer[$key]['answer_face']=(Db('user')->where(['user_id'=>$val['user_id']])->find())['user_face'];
                }
            }
//            dump($answer);exit;
//            查询被采纳的回答
            $get_answer=Db('answer')->where(['ask_id'=>$data['ask_id'],'answer_status'=>1])->find();
//            dump($get_answer);
            if($get_answer){
                view('',['res'=>$res,'ask_user'=>$ask_user['user_name'],'cateline'=>$arr,'count'=>$count,
                    'ask_level'=>$ask_level,'get_answer'=>$get_answer['user_id'],'answer_content'=>$get_answer['answer_content'],'ask_id'=>$data['ask_id'],
                    'user_name'=>$user_name,'user_id'=>$data['user_id'],'answer'=>$answer]);
            }else{
                view('',['res'=>$res,'ask_user'=>$ask_user['user_name'],'cateline'=>$arr,'count'=>$count,
                    'ask_level'=>$ask_level,'get_answer'=>'暂无回答','answer_content'=>'问题暂未被解决','ask_id'=>$data['ask_id'],
                    'user_name'=>$user_name,'user_id'=>$data['user_id'],'answer'=>$answer]);
            }
        }

    }

//    回答问题
    public function addAnswer(){
      if($this->request->isPost()){
          $data=request()->post();
//          [user_name] => メイとトトロ
        //    [user_id] => 24
        //    [ask_gold] => 5
        //    [ask_id] => 1
        //    [answer_content] => 因为地球引力
        //    [qid] =>
//         dump($data);
          $answer_time=date('Y-m-d H:i:s',time());
          $userinfo=Db('userinfo')->where(['user_id'=>$data['user_id']])->find();
          $userinfo=Db('userinfo')->where(['user_id'=>$data['user_id']])->
          update(['user_exp'=>($userinfo['user_exp']+5),'answer_num'=>($userinfo['answer_num']+1)]);
          $ask_answer=Db('ask')->where(['ask_id'=>$data['ask_id']])->find();
          $ask_answer=Db('ask')->where(['ask_id'=>$data['ask_id']])->update(['ask_num_answer'=>($ask_answer['ask_num_answer']+1)]);
          $answer=Db('answer')->insert(['user_id'=>$data['user_id'],'answer_content'=>$data['answer_content'],
              'ask_id'=>$data['ask_id'],'answer_time'=>$answer_time,'user_id'=>$data['user_id']]);


      }


    }
//    展示问题所属分类链
    public function Cateline($cates,$cate){
        $arr=[];
        foreach ($cates as $key=>$val){
            if($val['cate_id']==$cate['cate_pid']){
                $arr[]=$val;
                $arr=array_merge($arr,$this->Cateline($cates,$val));
            }

        }
        return $arr;
    }
//查找所有该问题的答案
    public function getQuestion(){
//        config('debug',false);
        if(request()->isGet()) {
            $data=request()->get();
//            $data里面为问题信息
            dump($data);
            $pagenow=$data['pagenow'];

            $pagesize=$data['pagesize'];
            $start=($pagenow-1)*$pagesize;
////            查所有回答
            $answer=Db('answer')->where(['ask_id'=>$data['ask_id']])->limit($start,$pagesize)->select();
            if(!$answer){
                $answer[]=['answer_content'=>'快来抢第一个回答问题的超级答题王吧','answer_time'=>'-----','answer_face'=>" <{<{resource()}>index/Images/profile_avatar.jpg "];
                echo json_encode(['status'=>1,'msg'=>'ok','data'=>$answer]);
            }else{
                foreach ($answer as $key=>$val){
                    $answer[$key]['answer_face']=(Db('user')->where(['user_id'=>$val['user_id']])->find())['user_face'];
                }
                echo json_encode(['status'=>0,'msg'=>'not','data'=>$answer]);
            }
//            dump($answer);


        }

    }


}


?>