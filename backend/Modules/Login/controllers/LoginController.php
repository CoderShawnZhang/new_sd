<?php

namespace backend\Modules\Login\controllers;

use yii\web\Controller;

/**
 * 登录控制器
 */
class LoginController extends Controller
{
    /**
     * Renders the index view for the module
     * @return string
     */
    public function actionIndex()
    {
        return $this->render('index');
    }
}
