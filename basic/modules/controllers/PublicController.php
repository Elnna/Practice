<?php

namespace app\modules\controllers;

use yii\web\Controller;
use app\modules\models\Admin;
use Yii;
/**
 * Default controller for the `admin` module
 */
class PublicController extends Controller
{
    /**
     * Renders the index view for the module
     * @return string
     */
    public $layout = false;
    public function actionLogin()
    {
       /* session_start();
        var_dump($_SESSION);*/
        //如果登录，就直接跳到后台首页
        if(isset(Yii::$app->session['admin']['isLogin'])){
            $this->redirect(['default/index']);
            Yii::$app->end();
        }
        $model = new Admin;
        if(Yii::$app->request->isPost){
            $post = Yii::$app->request->post();
            if($model->login($post)){
                $this->redirect(['default/index']);
                Yii::$app->end();
            }
        }
        return $this->render('login',['model' => $model]);

    }
    public function actionLogout(){
        Yii::$app->session->removeAll();
        if(!isset(Yii::$app->session['admin']['isLogin'])){
            $this->redirect(['public/login']);
            Yii::$app->end();
        }
        $this->goBack();
    }

    public function actionSeekpwd($pwd = '')
    {   
        $model = new Admin;
        if(Yii::$app->request->isPost){
            $post = Yii::$app->request->post();
            if($model->seekPwd($post)){
                Yii::$app->session->setFlash('info','电子邮件发送成功');
            }
        }
    	return $this->render('seekpwd',['model' => $model]);
    }
}
