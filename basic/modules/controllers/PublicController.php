<?php

namespace app\modules\controllers;

use yii\web\Controller;
use app\modules\models\Admin;
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
        $model = new Admin;
        return $this->render('login',['model' => $model]);

    }

    public function actionSeekpwd($pwd = '')
    {
    	return $this->render('seekpwd');
    }
}
