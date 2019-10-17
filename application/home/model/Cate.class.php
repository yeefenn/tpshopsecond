<?php
namespace appliaction\home\model;
use framework\core\Model;

class Cate extends Model{
    public function orderCate(){
        $cate_all=$this->select();
        $cate_order=[];
        foreach ($cate_all as $key=>$val){
            if($val['cate_pid']==0){
                foreach ($cate_all as $k=>$v){
                    if($v['cate_pid']==$val['cate_id']){
                        $val['child'][]=$v;
                        $cate_order=$val;
                    }
                }

            }
        }
        return $cate_order;
    }
//    查找分类链
    public function Cateline($cate){
        $arr=[];
        $cates=$this->select();
        foreach ($cates as $key=>$val){
            if($val['cate_id']=$cate['cate_pid']){
                $arr[]=$val;
                $arr=array_merge($arr,$this->Cateline($cates,$val));
            }

        }
        return $arr;
    }
}


?>