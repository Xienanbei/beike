<?php
namespace app\index\controller;

use think\Controller; 


class KlassController extends Base{  

	public function index(){
   		$Klasss=model('Klass')->getAllKlass();
   		$this->assign('klasss',$Klasss);
   		return $this->fetch();
	}
	public function add(){
		$teachers=model('Teacher')->getTachers();
		$this->assign('teachers',$teachers);
		return $this->fetch();
	}
public function save(){

	if(!request()->isPost())
	{
		$this->error('非法提交');
	}
	//获取提交数据
	$data=input('post.');
   //验证数据合法性
   
   //数据再加工
   $klassData=[
		'name'=>$data['name'],
		'teacher_id'=>$data['teacher_id'],
		
   ];
   //调用模型里的增加数据方法
  $klassid= model('Klass')->add($klassData);
   //根据返回结果判断是否保存成功
	if($klassid){
		$this->success('增加成功，新增数据id为'.$klassid,'klass/index');
	}
	$this->error('失败');	

}

public function delete(){
	if(!input('?param.id')){
		$this->error('参数有误');
	}
	$id=input('param.id');
	$klass=	model('Klass')->get($id);
	if(!is_null($klass)){
		if($klass->delete()){
			$this->success('删除成功','klass/index');
		}
	}
	$this->error('删除有误');
}
public function detail()
{
	if(!input('?param.id')){
		$this->error('参数有误');
	}
	$id=input('param.id');
	$klass=	model('Klass')->get($id);
	//传参数
	$this->assign('klass',$klass);
	return $this->fetch();
	
}

public function edit()
{
	if(!input('?param.id')){
		$this->error('参数有误');
	}
	$id=input('param.id');
	$klass=	model('Klass')->get($id);
	//获取所有的老师
	$teachers=model('Teacher')->getTachers();
		$this->assign('teachers',$teachers);
	//传参数
	$this->assign('klass',$klass);
	return $this->fetch();
	
}

public  function update()
{
	//更新

}
}