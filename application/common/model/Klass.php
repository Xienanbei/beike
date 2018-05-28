<?php
namespace app\common\model;
use think\Model;
class Klass extends Model{
	//取数据
	public function getAllKlass()
	{
		//查询条件 'sex'=>0
		$data=[];
		//排序方式
		$order=['id'=>'desc'];
	    return	$this->where($data)
				->order($order)
				->paginate();  //1
	}

	public function add($data){

		$this->save($data);
		return $this->id;
	}
	public function Teacher(){
		
		return $this->belongsTo('Teacher');
	}

	public function getKlasss()
	{
		//查询条件 'sex'=>0
		$data=[];
		//排序方式
		$order=['id'=>'desc'];
	    return	$this->where($data)
				->order($order)
				->select();  //1
	}

}