<?php
namespace app\controllers;

use yii\web\Controller;

/**
* 
*/
class ProductController extends Controller
{
	/*
	function __construct(argument)
	{
		# code...
	}*/
	public $layout = false;
	public function actionIndex(){
		return $this->render('index');//默认去掉模版的头部和尾部
	}
	public function actionDetail(){
		return $this->render('detail');//默认去掉模版的头部和尾部
	}
}
