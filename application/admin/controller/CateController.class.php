<?php
namespace application\admin\controller;
use framework\core\Controller;
use framework\core\Cookie;
use framework\core\Debug;
use framework\core\Session;

class CateController extends Controller{

    public function show(){
//        查询所有分类并排序
        if (request()->isGet()){
            $cateModel=D('cate');
            $cates=$cateModel->findOrderCate($cateModel->findAllCate());
//            dump($cates);exit;
            view('',['cates'=>$cates]);
        }

    }
    public function add(){
        if(request()->isGet()){
            //        查询分类表，查出所有分类并排序
            $cateModel=D('cate');
            $cates=$cateModel->findOrderCate($cateModel->findAllCate());
            view('',['cates'=>$cates]);
        }
        if(request()->isPost()){
//            接值，添加数据
            $cateModel=D('cate');
            $res=request()->Post();
//            dump($res);exit;
            $data=["cate_name"=>$res['cate_name'],'cate_order'=>$res['cate_order'],'cate_status'=>$res['cate_status'],'cate_pid'=>$res['cate_pid']];
//            dump($data);exit;
            $cates=$cateModel->add_do($data);
//            dump($cates);exit;
            if ($cates){
                $admin=Session::get('admin');
                $log_content=$admin['admin_name']."添加了一个".$res['cate_name'].'分类';
               $res= D('log')->add($log_content);
                $this->success("添加成功",url('show'));
            }else{
                $this->success("添加失败",url('add'));
            }
        }
    }
//    删除分类
    public function delect(){
        if(request()->isGet()){
            //        查询分类表，查出所有需要删除的数据
            $cateModel=D('cate');

        }
    }
//    修改分类
    public function update(){
        if(request()->isGet()){
            //        查询分类表，查出需要修改的数据
//            查询所有分类，用于分类的修改
            $cateModel=D('cate');
            $cate=$cateModel->findOrderCate($cateModel->findAllCate());
//                        dump($cate);exit;
            $res=request()->get();
//           dump($res) ;exit;
            $data=$cateModel->findOne($res);
            view('',['data'=>$data,'cates'=>$cate]);

        }
        if(request()->isPost()){
//            接值进行修改
            $cateModel=D('cate');
            $res=request()->Post();
            $data=["cate_name"=>$res['cate_name'],'cate_order'=>$res['cate_order'],'cate_status'=>$res['cate_status'],'cate_pid'=>$res['cate_pid']];
            $cates=$cateModel->findOne_update($res['cate_id'],$data);
            if ($cates){
                $admin=Session::get('admin');
                $log_content=$admin['admin_name']."修改了一个".$res['cate_name'].'分类';
                D('log')->add($log_content);
              $this->success("修改成功",url('show'));
           }else{
               $this->success("修改失败",url('update'));
            }
        }
    }

}

?>