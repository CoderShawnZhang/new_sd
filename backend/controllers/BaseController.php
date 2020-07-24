<?php
namespace backend\controllers;

use Yii;
use yii\web\Controller;
use yii\filters\VerbFilter;
use yii\filters\AccessControl;
use common\models\LoginForm;

/**
 * 顶层基类
 */
class BaseController extends Controller
{
	public $layout = '@app/views/layouts/iframeMain.php';

	public function actionIndex()
    {
        $user = Yii::$app->getUser();
        if ($user->getIsGuest()) {
            $user->loginRequired();
        } else {
            $this->redirect(['site/index']);
        }
    }
}