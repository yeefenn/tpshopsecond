<?php
namespace framework\core;
class Controller{
    public $view;
    public $request;
    public function __construct(){
        $this->view=new View();
        $this->request=App::get("request");
    }
    public function assign($name,$value){
        $this->view->assign($name,$value);
    }
    public function fetch($html_path=null){
        $this->view->display($html_path);
    }
    //失败返回
    public  function error($msg,$sec=3){
        echo "<div style='width:90%;margin:2px auto'><span style='font-weight:bold'>(:</span>".$msg."</div>";
        echo "<div style='width:90%;margin:2px auto'><span id='second' style='font-size:15'>".$sec."</span>秒后跳转到上一个页面</div>";
        echo <<< SECOND
				<script>
					var t=$sec;
					function time(){
						if(t>0){
							document.getElementById("second").innerHTML=t;
							t--;
						}else{
							document.getElementById("second").innerHTML=0;
							history.back();
							clearInterval(a);
						}
					}
					var a=setInterval('time()',1000);
				</script>
SECOND;
        exit;
    }
    //成功跳转
    public function success($msg,$url,$sec=3){
        echo "<div style='width:90%;margin:2px auto'><span style='font-weight:bold'>(:</span>".$msg."</div>";
        echo "<div style='width:90%;margin:2px auto'><span id='second' style='font-size:15'>".$sec."</span>秒后跳转到下一个页面</div>";
        echo <<< SECOND
				<script>
					var t=$sec;
					function time(){
						if(t>0){
							document.getElementById("second").innerHTML=t;
							t--;
						}else{
							document.getElementById("second").innerHTML=0;
							location.href="$url";
							clearInterval(a);
						}
					}
					var a=setInterval('time()',1000);
				</script>
SECOND;
        exit;
    }
    //直接跳转
    public function redirect($url=null){
        if($url===null){
            echo "<script>history.back()</script>";
        }
        echo "<script>location.href=".$url."</script>";
        return;
    }




}