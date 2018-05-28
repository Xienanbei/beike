<?php
namespace app\common\model;
use think\Model;

class Student extends Model{

	public function getAllStudentPaginte(){
		$data=[];
		$order=['id'=>'desc'];
		return $this->where($data)
		->order($order)
		->paginate();
	}

	public function add($data){
		$this->save($data);
		return $this->id;
	}
	public function Klass(){
		return	$this->belongsTo('Klass');
	}
}