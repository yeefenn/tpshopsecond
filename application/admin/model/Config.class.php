<?php
namespace application\admin\model;
use framework\core\Model;

class Config extends Model{
//    查找所有
    public function findAll(){
        return $this->select();
    }
//    添加单条
    public function addOne($data){
        return $this->insert($data);
    }
//    查找单条
    public function findOne($data){
        return $this->where($data)->find();
    }
//    修改配置名称，变量值
    public function update_do($config_id,$data){
        return $this->where($config_id)->update($data);
    }
//    修改配置value(太麻烦了。直接在控制器层处理吧)
//    public function update_value($data,$a,$b,$res){
//        foreach ($data as $k=>$v){
//            return $this->where([$a=>$v])->update([$b=>]);
//        }
//
//    }

}
?>