<?php
namespace app\common\validate;
use think\Validate;
class Teacher extends Validate{

	protected $rule=[
		/*	'name'=>'require|max:30',
			'sex'=>'number|between:0,1',
			'email'=>'email',
*/          ['id','require|number','id不能为空|id必须是数字'],
			['name','require|max:30','用户名不能为空|用户名的长度不能超过6个字符'],
			['sex','number|between:0,1','性别只能为数字|数值只能是0或1'],
			['email','email','要填写正确的邮箱格式']
	];
	protected $scene=[
			'add'=>['name','sex','email'],
			'edit'=>['id','name'],
			'delete'=>['id'],

	];

}