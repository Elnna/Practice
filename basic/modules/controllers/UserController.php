<?php

namespace app\modules\controllers;

use yii\web\Controller;

/**
 * Default controller for the `admin` module
 */
class UserController extends Controller
{
    /**
     * Renders the index view for the module
     * @return string
     */
    public $layout = false;
    public function actionIndex(){
		return $this->render('Index');
    }

     public function actionReg(){
		return $this->render('Reg');
    }

    public function actionChangeemail()
    {
        return $this->render('changeemail');
    }

    public function actionChangepwd()
    {
    	return $this->render('ChangePwd');
    }

    public function actionChangeemailpwd()
    {
    	return $this->render('ChangeEmailPwd');
    }

}
