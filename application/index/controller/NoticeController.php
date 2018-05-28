<?php
namespace app\index\controller;
use think\Controller;

class NoticeController extends Base{

	public function index(){

		$notices=Model('Notice')-> getNotices();

		return $this->fetch('',[
				'notices'=>$notices
			]);
	}

	public function add(){	
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
	    $validate=validate('Notice');
	   if(!$validate->scene('add')->check($data)){
	   	$this->error($validate->getError());
	   }


	   //数据再加工
	   $noticeData=[
			'title'=>$data['title'],
			'content'=>$data['content'],
			
	   ];
	   //调用模型里的增加数据方法
	  $noticeid= model('Notice')->add($noticeData);
	   //根据返回结果判断是否保存成功
		if($noticeid){
			$this->success('增加成功，新增数据id为'.$noticeid,'notice/index');
		}
		$this->error('失败');	

	}

	public function detail()
	{
		if(!input('?param.id')){
			$this->error('参数有误');
		}
		$id=input('param.id');
		$notice=	model('Notice')->get($id);
		//传参数
		$this->assign('notice',$notice);
		return $this->fetch();
		
	}

public function delete(){
	if(!input('?param.id')){
		$this->error('参数有误');
	}
	$id=input('param.id');
	$notice=	model('Notice')->get($id);
	if(!is_null($notice)){
		if($notice->delete()){
			$this->success('删除成功','notice/index');
		}
	}
	$this->error('删除有误');
}


public function edit()
{
	if(!input('?param.id')){
		$this->error('参数有误');
	}
	$id=input('param.id');
	$notice=	model('Notice')->get($id);
	
	//传参数
	$this->assign('notice',$notice);
	return $this->fetch();
	
}

public  function update()
{
	//更新
	if(!request()->isPost())
		{
			$this->error('非法提交');
		}
		//获取提交数据
		$data=input('post.');
	   //验证数据合法性
	    $validate=validate('Notice');
	   if(!$validate->scene('edit')->check($data)){
	   	$this->error($validate->getError());
	   }


	   //数据再加工
	   $noticeData=[
			'title'=>$data['title'],
			'content'=>$data['content'],
			
	   ];
	   //调用模型里的增加数据方法
	  $noticeid= model('Notice')->save($noticeData,['id'=>$data['id']]);
	   //根据返回结果判断是否保存成功
		if($noticeid){
			$this->success('更新成功，新增数据id为'.$noticeid,'notice/index');
		}
		$this->error('失败');	
}

}