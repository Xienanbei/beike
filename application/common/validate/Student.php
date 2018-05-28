<?php
namespace app\common\validate;
use think\Validate;

class Student extends Validate{

		protected $rule=[
			'name'=>'require|max:40',
			'num'=>'require|max:40',
			'sex'=>'number|between:0,1',
			'email'=>'email',
			'id'=>'number',		
		];
		protected $scene=[
			'add'=>['name','num'],
			'update'=>['id','name','num'],
		];

}