<?php

namespace app\modules\controllers;

use yii\web\Controller;

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
        return $this->render('login');
    }

    public function actionSeekpwd($pwd = '')
    {
    	return $this->render('seekpwd');
    }
}
