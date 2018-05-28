<?php
namespace app\index\controller;
use think\Controller;

class CourseController extends Base{

	public function index(){

		$courses=Model('Course')-> getCourse();

		return $this->fetch('',[
				'courses'=>$courses
			]);
	}
	public function add()
	{
		return  $this->fetch();
	}
	public function save(){
		if(!request()->isPost()){
			$this->error('请求错误');			
		}
		$data=input('post.');
		$validate=validate('Course');
		if(!$validate->scene('add')->check($data)){
			$this->error($validate->getError());
		}

		$courseData=[
			'name'=>$data['name'],
		];
		$result=model('Course')->add($courseData);
		if($result){
			$this->success('成功','course/index');
		}
		$this->error('失败');
	}
}