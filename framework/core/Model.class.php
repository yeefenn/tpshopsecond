<?php
namespace framework\core;
class Model{
    public $host; 		//主机名
    public $user; 		//用户名
    public $pwd;  		//密码
    public $dbname;		//数据库名
    public $charset;	//字符集
    public $link;		//数据库连接
    public $table;		//要操作的表
    public $where;		//查询条件
    public $field="*";	//字段

    public $limit="";
    public $order="";
    public $join="";
    private static $obj=null;

    private function __construct(){
//        $this->host=config("hostname");
//        $this->user=config("username");
//        $this->pwd=config("password");
//        $this->dbname=config("database");
//        $this->charset=config("charset");
        $this->setConfig();
        $this->connect();
    }
    public static function instance(){
        if(!self::$obj instanceof Model){
            self::$obj=new self();
        }
        return self::$obj;
    }
    private function __clone(){

    }
//   设置属性
    public  function setConfig(){
        $this->host=config("hostname");
        $this->user=config("username");
        $this->pwd=config("password");
        $this->dbname=config("database");
        $this->charset=config("charset");
    }
    //连接数据库
    public function connect(){
        $this->link=mysqli_connect($this->host.":".config("hostport"),$this->user,$this->pwd);
        if(!$this->link){
            throw new ErrorException("数据库连接错误");
            return false;
        }
        //选择数据库
        if(!mysqli_select_db($this->link,$this->dbname)){
            throw new ErrorException("选择数据库错误");
            return false;
        }
        //设置字符集
        if(!mysqli_set_charset($this->link,'utf8')){
            throw new ErrorException("设置字符集错误");
            return false;
        }
    }
    //切换表
    public function table($table){
        $this->table=config('prefix').$table;
        return $this;
    }

    //执行增删改语句
    public function execute($sql){
        App::get("debug")->sql[]=$sql;
        $res=mysqli_query($this->link,$sql);
        $this->where="";
        $this->field="*";
        $this->order="";
        $this->limit="";
        $this->join="";
        if($res){
            return true;
        }else{
            throw new ErrorException("sql语句错误");
            return false;
        }
    }
    //执行查语句
    public function query($sql){
        App::get("debug")->sql[]=$sql;
//        dump($sql);exit;
        $res=mysqli_query($this->link,$sql);
        $this->where="";
        $this->field="*";
        $this->order="";
        $this->limit="";
        $this->join="";
        if($res){
            return mysqli_fetch_all($res,MYSQLI_ASSOC);
        }else{
            throw new ErrorException("sql语句错误");
            return false;
        }
    }
    //where语句
    public function where($where=null,$ge="AND"){
        //如果条件为空
        if(empty($where)){
            $this->where=" WHERE 1";
        }
        //如果条件为一个字符串"`wish_name`='张三'"
        if(is_string($where) && !empty($where)){
            $whereList=explode("=",$where);
            //print_r($whereList);exit;
            $where="".implode("='",$whereList)."'";
            //print_r($where);exit;

            $this->where=" WHERE"." ".$where;
        }
        //如果条件为一个数组
        if(is_array($where) && !empty($where)){
            //将数组转化为字符串
            $whereList=[];
            foreach ($where as $key => $value) {
                $whereList[]="`".$key."`='".$value."'";
            }
            //print_r($whereList);exit;
            $where=" ".implode(" ".strtoupper($ge)." ",$whereList);
            //print_r($where);exit;
            $this->where=" WHERE".$where;
        }
        return $this;
    }
    //要执行的字段
    public function field($field="*"){
        if(is_string($field)){
            $this->filed=$field;
        }
        if(is_array($field)){
            $this->field="`".implode("`,`",$field)."`";
        }
        //print_r($field);exit;
        return $this;
    }
    //排序
    public function order($order){
        $this->order=" ORDER By ".$order;
        return $this;
    }
    //limit
    public  function limit($start,$end){
        $this->limit=" LIMIT ".$start.",".$end;
        return $this;
    }
    //join
    public function join($join){
        $this->join=" ".$join;
        return $this;
    }
    //添加单条数据
    public function insert($data){
        //判断数据是否是一个数组
        if(!is_array($data) || empty($data)){
            throw new ErrorException("请输入一个数组");
            return false;
        }
        $fieldArry=array_keys($data);
        $field='`'.implode('`,`',$fieldArry).'`';
        $value="'".implode("','",$data)."'";
        $sql="INSERT INTO ".$this->table."(".$field.") VALUES(".$value.")";
//        dump($sql);
        if($this->execute($sql)){
            return mysqli_insert_id($this->link);
        }else{
            return false;
        }
    }
    //添加多条数据
    public function insertAll($data){
        //判断数据是否是一个数组
        if(!is_array($data) || empty($data)){
            throw new ErrorException("请输入一个数组");
            return false;
        }
        //判断是否是一个二维数组
        if(!is_array($data[0])){
            throw new ErrorException("请输入一个二维数组");
            return false;
        }
        $fieldArry=array_keys($data[0]);
        $field='`'.implode('`,`',$fieldArry).'`';
        $valueList=[];
        foreach ($data as $key => $value) {
            $valueList[]="('".implode("','",$value)."')";
        }
        $value=implode(",",$valueList);
        $sql="INSERT INTO ".$this->table."(".$field.") VALUES ".$value."";
        if($this->execute($sql)){
            return mysqli_affected_rows($this->link);
        }else{
            return false;
        }
    }
    //删除
    public function delete(){
        $sql="DELETE FROM ".$this->table.$this->where."";
        return $this->execute($sql);
    }
    //修改
    public function update($data){
        $dataList=[];
        foreach ($data as $key => $value) {
            $dataList[]="`".$key."`='".$value."'";
        }
        $data=" ".implode(",",$dataList);
        $sql="UPDATE ".$this->table." SET ".$data.$this->where."";
        return $this->execute($sql);


    }
    //某个字段自增1
    public function oneselfadd($field,$number=0){
        $sql="UPDATE ".$this->table." SET ".$field."=".$field."+".$number.$this->where;
        return $this->execute($sql);
    }
    //某个字段自减1
    public function oneselfdelete($field,$number=0){
        $sql="UPDATE".$this->table." SET ".$field."=".$field."-".$number.$this->where;
        return $this->execute($sql);
    }
    //查单条
    public function find(){
        $sql="SELECT ".$this->field." FROM ".$this->table.$this->join.$this->where.$this->order.$this->limit;
//        dump($sql);
        $this->where="";
        $this->field="*";
        $this->order="";
        $this->limit="";
        $this->join="";
        App::get("debug")->sql[]=$sql;
        $res=mysqli_query($this->link,$sql);
        if($res){
            if(!$data=mysqli_fetch_assoc($res)){
                $data=[];
            }
            return $data;
        }else{
            throw new ErrorException("sql语句错误");
            return false;
        }
    }
    //查多条
    public function select(){
        $sql="SELECT ".$this->field." FROM ".$this->table.$this->join.$this->where.$this->order.$this->limit;
//        dump($sql);
        return $this->query($sql);
    }
    //获取影响的行数
    public function count(){
        $sql="SELECT ".$this->field." FROM ".$this->table.$this->join.$this->where."";
        if($res=$this->execute($sql)){
            return mysqli_affected_rows($this->link);
        }else{
            throw new ErrorException("sql语句错误");
            return false;
        }

    }
    //析构方法
    public function __destruct(){
        mysqli_close($this->link);
    }
}


?>