<?php
namespace app\common\validate;
use think\Validate;
class Klasscourse extends Validate{

	protected $rule=[
		/*	'name'=>'require|max:30',
			'sex'=>'number|between:0,1',
			'email'=>'email',
*/          ['id','require|number','id不能为空|id必须是数字'],
			['klass_id','require','不能为空|必须是数字'],
			['course_id','require|number','不能为空|必须是数字'],
			
	];
	protected $scene=[
			'add'=>['klass_id','course_id'],
			'edit'=>['id','klass_id','course_id'],
			'delete'=>['id'],

	];

}