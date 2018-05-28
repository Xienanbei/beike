<?php
namespace app\common\model;
use think\Model;

class KlassCourse extends Model{

	public function getAll(){
		//分页
		$order=['id'=>'desc'];
		return $this->order($order)
					->paginate();
	}
	public function Klass(){
		return $this->belongsTo('Klass');
	}
	public function Course(){
		return $this->belongsTo('Course');
	}
	public function savelist($data){

		return	$this->saveAll($data);
	}
}