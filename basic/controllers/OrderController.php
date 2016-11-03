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
		return $this->render('index');
	}
	public function actionCheckout(){
		return $this->render('checkout');
	}
}
