<?php
namespace application\admin\model;

use framework\core\Model;

class Cate extends Model{
    public function findAllCate(){
      return $this->select();
    }
    public function findOrderCate($cates,$pid=0,$i=0){
      $orderCate=[];
      foreach ($cates as $key=>$val){
          if ($val["cate_pid"]==$pid){
              $val['level']=$i;
              $orderCate[]=$val;
              $orderCate=array_merge($orderCate,$this->findOrderCate($cates,$val['cate_id'],$i+1));
          }
      }
        return $orderCate;
    }
    public function add_do($data){
//        $res=$this->insert($data);
//        dump($res);exit;
        return $this->insert($data);
    }
    public function findOne_delect(){
        return $this->delete();
    }
//    查找单条
    public function findOne($data){
        return $this->where($data)-> find();
    }
    public function findOne_update($res,$data){
        return $this->where(['cate_id'=>$res])->update($data);
    }
}


?>