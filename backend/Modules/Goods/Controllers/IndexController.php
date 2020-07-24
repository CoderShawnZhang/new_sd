<?php
namespace backend\Modules\Goods\Controllers;

use backend\controllers\BaseController;
use Service\ServiceModules\ServiceUser\Models\Ar\IdentityaInterface;
use Service\ServiceModules\ServiceUser\Models\Ar\UserIdentity;
/**
 * Site controller
 */
class IndexController extends BaseController
{
    public function actionIndex()
    {

        return $this->render('test');
    }
    public function actionTest()
    {
        /**
         * @var IdentityaInterface $t;
         */
        $t = \Yii::$app->user->identity;

        /**
         * @var IdentityaInterface $t;
         */
        $A = $t->username;
        var_dump($A);
        return $this->render('test');
    }
}