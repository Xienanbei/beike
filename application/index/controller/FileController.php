<?php
namespace app\index\controller;
use think\Controller;//1

class FileController extends Controller //2
{
    public function index()
    {
     
      return $this->fetch();
    }
    public function ajaxindex()
    {
     
      return $this->fetch();
    }
   public function upload(){
    // 获取表单上传文件 例如上传了001.jpg
    $file = request()->file('myfile');
    
    // 移动到框架应用根目录/public/uploads/ 目录下
    if($file){
        $info = $file->move(ROOT_PATH . 'public' . DS . 'uploads');
        if($info){
           
            // 输出 20160820/42a79759f284b767dfcb2a0197904287.jpg
        
             $this->success('上传成功，文件为'.$info->getSaveName(),'index/index');
        }else{
            // 上传失败获取错误信息
           
            $this->error($file->getError());
        }
    }
    else
    	{  $this->error('error');}
    }

 public function myupload(){
      
        $file = request()->file('file');

        $data['status'] = 1;   
        if(empty($file)){  
          //  $this->error('文件导入错误');
           $data['status'] =0;   
        }
      
        $info = $file->rule('uniqid')->move(ROOT_PATH . 'public' . DS . 'uploads');
        if(!$info){             
            //  $this->error('文件上传错误');
             $data['status'] =0;   
             
        } 
        
         $data['url'] =$info->getFilename();
         unset($info);
        
      
         return json_encode($data);
    }

}
