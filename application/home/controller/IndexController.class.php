<?php
    namespace application\home\controller;
    use framework\core\Controller;
    class IndexController extends Controller{
        public function home(){
            echo "<div style='font-size:150px;font-weight:bold;'>:)</div><div style='font-size:30px;font-weight:bold;'>欢迎使用自定义tp</div>";
        }
    }
?>