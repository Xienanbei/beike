<?php
namespace app\common\model;
use think\Model;
class Teacher extends Model{
	//取数据
	public function getAllTeacher()
	{
		//查询条件 'sex'=>0
		$data=[];
		//排序方式
		$order=['id'=>'desc','sex'=>'desc'];
	    return	$this->where($data)
				->order($order)
				->paginate();  //1
	}

	public function add($data){

		$this->save($data);
		return $this->id;
	}

	public function getTachers()
		{
		//查询条件 'sex'=>0
		
		//排序方式
		$order=['id'=>'desc','sex'=>'desc'];
	    return	$this->order($order)
				->select();  //1
	}
	public function getTeacherByuserName($username){

		$data=['username'=>$username];		
		return $this->where($data)->find();
	}
}