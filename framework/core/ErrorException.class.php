<?php
namespace framework\core;
//Exception为系统自在的异常处理类
//$e=new \Exception();
class ErrorException extends \Exception{

     public  function exceptionHandler($e){
         if(config("debug")){
//             显示错误信息
             $this->getInfo($e);
         }
//         写日志
         $this->write_log($e);
         exit("<h1>页面出错，请稍后再试！</h1>");
     }
     public  function getInfo($e){
         $str=<<<EOF
     <h3><b style="font-size: 40px:">:(</b><div>程序发生错误，如下：</div></h3>
     <p><b>错误信息：</b> {$e->getMessage()} </p>
     <p><b>运行流程：{$e->getTraceAsString()}</b></p>
EOF;
     echo $str;
     }
     public function write_log($e){
//         写错误信息
         $log_dir=APP_RUNTIME_PATH."log/".date("Y-m-d")."/";
         if(!is_dir($log_dir)){
             mkdir($log_dir,true,0777);
         }
         $log_file=$log_dir."error_".date("H").".log";
//         strip_tags将html标签脱离
         $data=strip_tags($e->getMessage())." 时间:".date("Y-m-d")." IP:".$_SERVER['REMOTE_ADDR']."\n";
//         file_put_contents(APP_RUNTIME_PATH."log/");
         error_log($data,3,$log_file);
     }
}


?>