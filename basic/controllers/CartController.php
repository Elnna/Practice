<?php
namespace app\controllers;

use yii\web\Controller;

/**
* 
*/
class CartController extends Controller
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
	
}
