<?php
namespace app\modules\controllers;
use yii\web\controller;
use app\modules\models\Admin;
use Yii;

/**
* 
*/
class ManageController extends Controller
{
	
	/*function __construct(argument)
	{
		# code...
	}*/
	public function actionChangemailpwd()
	{
		$this->layout = false;
		$time = Yii::$app->request->get('timestamp');
		$adminUser = Yii::$app->request->get('adminUser');
		$token = Yii::$app->request->get('token');
		$model = new Admin;
		$mytoken = $model->createToken($adminUser,$time);

		if(time()-$time > 3000 || $token != $mytoken){
			$this->redirect(['public/login']);
			Yii::$app->end();
		}
		if(Yii::$app->request->isPost){
			$post = Yii::$app->request->post();
			var_dump($model->changePass($post));exit;
			if($model->changePass($post)){

				Yii::$app->session->setFlash('info','密修改成功');
			}
		}
		$model->admin_user = $adminUser;
		return $this->render('changeMailPwd',['model' => $model]);
	}
	public function actionIndex()
	{
		echo "Hello,world";
	}
}