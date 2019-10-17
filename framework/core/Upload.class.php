<?php 
     /**
      * 
      */
 namespace frameworek\core;
     use framework\core\ErrorException;

     class Upload
     {
     	public $rootPath="upload";
     	public $savePath='';
     	public $allowtype=array('jpg','jpeg','png','gif');
     	public $maxsize=3000000;
     	public $error;
     	//上传单个文件
     	public function checkfile($file){
     		//判断文件上传是否为空
     		if (empty($file['name'])) {
//     		    throw new ErrorException()；
     			$this->error="上传文件为空";
     			return false;
     		}
     		//判断文件上传错误类型
     		if ($file['error']!=0) {
     			$this->error="上传出错";
     			return false;
     		}
     		//判断文件上传类型
     		$ext=$this->getExt($file['name']);
     		if (!in_array($ext, $this->allowtype)) {
     			$this->error="不支持该类型文件";
     			return false;
     		}
     		//判断文件大小
     		if ($file['size']>$this->maxsize) {
     			$this->error="文件过大";
     			return false;
     		}
     		//判断是否是临时文件
     		if (!is_uploaded_file($file['tmp_name'])) {
     			$this->eroor="上传文件不是一个临时文件";
     			return false;
     		}
            return true;
     	}
     	//单文件上传
     	public function uploadOne($file){
            if ($this->checkfile($file)) {
            	$dir=$this->getUploadDir();
            	$ext=$this->getExt($file['name']);
            	$path=$dir.uniqid().".".$ext;
            	if (move_uploaded_file($file['tmp_name'], $path)) {
            		return $path;
            	}else{
            		$this->error="上传文件失败";
            		return false;
            	}
            }else{
            	return false;
            }
     	}
     	//多文件上传
     	public function uploads(){
     		if ($fileArr=$this->dealUploadsArr()) {
     			$pathArr=[];
     			foreach ($fileArr as $key => $value) {
     				$path=$this->uploadOne($value);
     				array_push($pathArr, $path);
     			}
     			return $pathArr;
     		}else{
     			return false;
     		}
     	}

     	//获取文件后缀名
     	public function getExt($filename){
            return pathinfo($filename,PATHINFO_EXTENSION);
     	}
     	//获取文件保存路径
     	public function getUploadDir(){
     		$dir=trim($this->rootPath,"/")."/".trim($this->savePath,"/")."/".date("Y-m-d")."/";
     		if (!is_dir($dir)) {
     			mkdir($dir,0777,true);
     		}
     		return $dir;
     	}
     	//处理多文件上传的数组
     	public function dealUploadsArr(){
     	
     		$file=array_pop($_FILES);
            if (!empty($file['name'][0])) {
            	
            	foreach ($file as $key => $value) {
            		foreach ($value as $k => $v) {
            		
            			$fileArr[$k][$key]=$v;
            		}
            	}
            	return $fileArr;
            }else{
                $this->error="没有上传文件";
            	return false;   
            }
     	}
     	 获取错误信息
     	 public function getError(){
     	 	return $this->error;

     	 }
       
     }
?>