<?php
namespace app\common\validate;
use think\Validate;

class course extends Validate{

		protected $rule=[
			'name'=>'require|max:40',			
			'id'=>'number',		
		];
		protected $scene=[
			'add'=>['name'],
			'update'=>['id','name'],
		];

}