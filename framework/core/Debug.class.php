<?php
namespace framework\core;
class Debug{
    private $time=[];
    private $mem=[];
    public $file=[];
    public $sql=[];

    public  function start(){
//
        $this->time['start']=$this->getMicrtime();
//        memory_get_usage 运行消耗内存的情况
        $this->mem['start']=memory_get_usage();
    }
    public function end(){
        $this->time['end']=$this->getMicrtime();
        $this->mem['end']=memory_get_usage();
        if(config('debug')){
            echo "<h1>基本</h1>";
            echo "<p>运行时间:".round(($this->time['end']-$this->time['start']),6)."</p>";
            echo "<p>内存消耗:".($this->mem['end']-$this->mem['start'])."b</p>";
            echo "<h1>文件</h1>";
            echo "<p>".BASE_PATH."cate.php</p>";
            echo "<p>".FRAMEWORK_PATH."bootstrap.php</p>";
            echo "<p>".FRAMEWORK_CORE_PATH."App.class.php</p>";
             foreach ($this->file as $k=>$v){
                 echo "<p>".$v."</p>";
             }
            echo "<h4>SQL语句 </h4>";
            foreach($this->sql as $key=>$val){
                echo "<p>".$val."</p>";
            }
        }
    }
    public  function getMicrtime(){
        $time=explode(" ",microtime());
        return $time[1]+$time[0] ;
    }
}

?>