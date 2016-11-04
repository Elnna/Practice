<?php
namespace app\controllers;

use yii\web\Controller;

/**
* 
*/
class OrderController extends Controller
{
	/*
	function __construct(argument)
	{
		# code...
	}*/
	public $layout = false;
	public function actionIndex(){
		$this->layout = 'layoutnav';
		return $this->render('index');
	}
	public function actionCheckout(){
		$this->layout = 'layout';
		return $this->render('checkout');
	}
}
