<?php
namespace appliaction\home\model;
use framework\core\Model;

class Oauth extends Model{
    public function add($data){
        return $this->insert($data);
    }
    public function findOne($data){
        return $this->where($data)->find();
    }

}


?>