<?php
namespace app\common\model;
use think\Model;

class Notice extends Model{

	public function getNotices(){
		//分页
		$order=['id'=>'desc'];
		return $this->order($order)
					->paginate();
	}

	public function add($data){

		$this->save($data);
		return $this->id;
	}
	
}