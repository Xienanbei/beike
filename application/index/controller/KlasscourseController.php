<?php
namespace app\index\controller;
use think\Controller;

class KlasscourseController extends Base{

	public function index(){

		$kcs=Model('KlassCourse')-> getAll();

		return $this->fetch('',[
				'kcs'=>$kcs
			]);
	}

	public function add(){
		$klasss=model('Klass')->getKlasss();
		$courses=model('Course')->getCourses();

		$this->assign('klasss',$klasss);
		$this->assign('courses',$courses);
		return $this->fetch();
	}



public function save(){

	if(!request()->isPost())
	{
		$this->error('非法提交');
	}
	//获取提交数据
	$data=input('post.');
	$validate=validate('Klasscourse');
	if(!$validate->scene('add')->check($data)){
		$this->error('cuo');
	}
   //验证数据合法性
   $kids=$data['klass_id'];
   $cid=$data['course_id'];
$kcs=[];
   foreach ($kids as $key => $kid) {
   	 $kcs[$key]['klass_id']=$kid;
   	  $kcs[$key]['course_id']=$cid;
   }
   //调用模型里的增加数据方法
  $res= model('KlassCourse')->savelist($kcs);
   //根据返回结果判断是否保存成功
	if($res){
		$this->success('增加成功','klasscourse/index');
	}
	$this->error('失败');	

}
}