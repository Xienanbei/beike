<?php
namespace app\common\validate;
use think\Validate;
class Notice extends Validate{

	protected $rule=[
		     ['id','require|number','id不能为空|id必须是数字'],
			['title','require|max:50','标题不能为空|标题的长度不能超过50个字符'],
			['content','require','内容不能为空'],
			
	];
	protected $scene=[
			'add'=>['title','content'],
			'edit'=>['id','title','content'],
			'delete'=>['id'],
	];

}