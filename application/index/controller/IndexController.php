<?php
namespace app\index\controller;
use think\Controller;//1
use think\Db;
class IndexController extends Controller //2
{
    public function index()
    {
      //3
      return $this->fetch();
    }
}
