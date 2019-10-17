<?php
namespace application\admin\controller;
use framework\core\Controller;
use framework\core\Session;

class ConfigController extends Controller{
    public function index(){
        view();
    }
    public function show(){
        if (request()->isGet()){
            $configModel=D('config');
            $all_config=$configModel->findAll();
//            dump($all_config);exit;
            foreach ($all_config as $k=>$val){
//                文本框
                if($val['config_input_type']==0){
                    $all_config[$k]['html']="<input name='config_value[]' value='".$val['config_value']."'>";
                }
//                文本域
                if($val['config_input_type']==1){
                    $all_config[$k]['html']="<textarea name='config_value[]' value='".$val['config_value']."'></textarea>";
                }
//                单选框
                if($val['config_input_type']==2){
                    $all_config[$k]['html']="";
                    $select_values=explode("，",$val['config_select_values']);
                    foreach ($select_values as $key=>$value){
                        $res=explode('|',$value);
                        if($res[0]==$val['config_value']){
                            $all_config[$k]['html'].="<input checked type='radio' name='config_value[]' value='".$res[0]."'>".$res[1];
                        }else{
                            $all_config[$k]['html'].="<input  type='radio' name='config_value[]' value='".$res[0]."'>".$res[1];
                        }
                    }
                }
//                下拉框
                if($val['config_input_type']==3){
                    $all_config[$k]['html']="<select name='config_value[]'>";
                    $select_values=explode("|",$val['config_select_values']);
                    foreach ($select_values as $key=>$value){
                        if($value==$val['config_value']){
                            $all_config[$k]['html'].="<option selected value='".$value."'>".$value."</option>";
                        }else{
                            $all_config[$k]['html'].="<option  value='".$value."'>".$value."</option>";
                        }
                    }
                    $all_config[$k]['html'].="</select>";
                }
//               return $all_config[$k]['html'];
            }
//        dump($all_config);exit;
            view('',['configs'=>$all_config]);
        }

    }
//    添加配置
    public function add(){
         if(request()->isGet()){
             view();
         }
        if(request()->isPost()){
            $configModel=D('config');
            $arr=request()->Post();
            $data=['config_name'=>$arr['config_name'],'config_var'=>$arr['config_var'],'config_order'=>$arr['config_order'],'config_desc'=>$arr['config_desc'],'config_input_type'=>$arr['config_input_type'],'config_select_values'=>$arr['config_select_values']];
//             dump($data);exit;
             $res=$configModel->addOne($data);
//             dump($res);exit;
            if ($res){
                $admin=Session::get('admin');
                $configs=$admin['admin_name']."添加了一个".$arr['config_name'].'配置';
                D('log')->add($configs);
                $this->success("添加成功",url('show'));
            }else{
                $this->success("添加失败",url('add'));
            }
        }

    }
//    保存修改配置
    public function update(){
//     接config_id,查找数据展示
        if(request()->isGet()){
            $res=request()->Get();
            $data=['config_id'=>$res['config_id']];
//            dump($res);exit;
            $configModel=D('config');
            $data=$configModel->findOne($res);
//            dump($data);exit;
            view('',['data'=>$data]);
        }
        if(request()->isPost()){
            $configModel=D('config');
            $res=request()->Post();
            dump($res);
            $config_id=['config_id'=>$res['config_id']];
            $data=["config_name"=>$res['config_name'],"config_var"=>$res['config_var']];
            $update_do=$configModel->update_do($config_id,$data);
//            dump($update_do);exit;
            if ($update_do){
                $admin=Session::get('admin');
                $configs=$admin['admin_name']."修改了一个".$res['config_name'].'配置的名称或者var';
                D('log')->add($configs);
                $this->success("修改成功",url('show'));
            }else{
                $this->success("修改失败",url('update'));
            }
        }
    }
//    修改配置的值
public function update_config(){
    if(request()->isPost()){
//            echo "我怎么输出不了11";
        $configModel=D('config');
        foreach ($_POST['config_id'] as $key=>$val){
            $res=$configModel->where(['config_id'=>$val])->update(['config_value'=>$_POST['config_value'][$key]]);
//            $this->putConfigFile();exit;
            if ($res){
//                $admin=Session::get('admin');
//                $configs=$admin['admin_name']."修改了".$_POST['config_id'].'号配置的值';
//                D('log')->add($configs);

                $this->success("修改成功",url('show'));
            }else{
                $this->success("修改失败",url('update_config'));
            }
        }
//           修改后修改配置文件
//           $this->putConfigFile();
    }
}
//     把配置放入配置文件
private function putConfigFile(){
//        echo 111;
    $config=D("config")->field(['config_var','config_value'])->order("config_order desc")->select();
    $config=array_column($config,"config_value","config_var");
        $data="<?php\n\treturn ". var_export($config)."\n?>";
   file_put_contents(APP_CONFIG_PATH."web.php",$data);

}

}
?>