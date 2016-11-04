<?php
namespace app\controllers;

use yii\web\Controller;

/**
* 
*/
class UserController extends Controller
{
	/*
	function __construct(argument)
	{
		# code...
	}*/
	public $layout = false;
	public function actionindex(){
		return $this->render('index');
	}
	public function actionLogin(){
		$this->layout = 'layoutnav';
		return $this->render('login');
	}
}
