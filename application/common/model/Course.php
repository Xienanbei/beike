<?php
namespace app\common\model;
use think\Model;

class Course extends Model{

	public function getCourse(){
		//分页
		$order=['id'=>'desc'];
		return $this->order($order)
					->paginate();
	}
	public function add($data){
		$this->save($data);
		return $this->id;
	}
	

		public function getCourses(){
		//分页
		$order=['id'=>'desc'];
		return $this->order($order)
					->select();
	}
}