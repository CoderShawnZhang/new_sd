<?php
namespace backend\Modules\Goods\Controllers;

use backend\controllers\BaseController;
use Service\Modules\User\Models\Ar\IdentityaInterface;
use Service\Modules\User\Models\Ar\UserIdentity;
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
        return $this->render('test');
    }
}