<?php
namespace app\controllers;

use yii\web\Controller;

/**
* 
*/
class IndexController extends Controller
{
	/*
	function __construct(argument)
	{
		# code...
	}*/
	public function actionIndex(){
		/*$this->layout = false; 	//禁止布局
		return $this->render('index');*/
		/*return $this->renderPartial('index');//默认去掉模版的头部和尾部*/
		$this->layout = 'layout';
		return $this->render('index');
	}
}
