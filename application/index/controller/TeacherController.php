<?php
namespace app\index\controller;

use think\Controller; 

use app\common\model\Teacher;//1

class TeacherController extends Base{  //2继承
	public function index()
	{
		
	   $teachers= model('Teacher')->getAllTeacher();
	  //$this->assign('teachers',$teachers);
      //return $this->fetch();
	   return $this->fetch('',['teachers'=>$teachers]);
	}
	public function hi()//index.html
	{
		return $this->fetch('test@test/hello');
	}
	public function add(){
		
		return $this->fetch();
	}
	public function save(){
	//提交方式post
	if(!request()->isPost())
	{
		$this->error('非法提交');
	}
	//获取提交数据
	$data=input('post.');
   //验证数据合法性
   $validate=validate('Teacher');
   if(!$validate->scene('add')->check($data)){
   	$this->error($validate->getError());
   }
   //数据再加工
   $teacherData=[
		'name'=>$data['name'],
		'username'=>$data['username'],
		'email'=>$data['email'],
		'sex'=>$data['sex'],
		'password'=>md5($data['password']),
   ];
   //调用模型里的增加数据方法
  $teacherid= model('Teacher')->add($teacherData);
   //根据返回结果判断是否保存成功
	if($teacherid){
		$this->success('增加成功，新增数据id为'.$teacherid,'teacher/index');
	}
	$this->error('失败');	

      

	
	}
}