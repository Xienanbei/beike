<?php 
namespace app\index\controller;
use think\Controller;

class LoginController extends Controller{

	public function index(){
		$teacher=session('my_user','','my');
		if($teacher&&$teacher->id){
			$this->redirect('teacher/index');
		}
		return $this->fetch();
	}
	public function check(){
		if(!request()->isPost()){
			$this->error('有错');
		}
		$data=input('post.');

		if(!captcha_check($data['captcha'])){ 			
    		$this->error('验证码错误');
		};

		$username=$data['username'];
		$teacher=model('Teacher')->getTeacherByuserName($username);
		if(!$teacher){
			$this->error('有错');
		}

		if($teacher->password!=md5($data['password'])){
			$this->error('密码有错');
		}
		session('my_user',$teacher,'my');
		$this->success('ok','teacher/index');

	}
	public function logout(){
		session(null,'my');
		$this->redirect('login/index');
	}
}