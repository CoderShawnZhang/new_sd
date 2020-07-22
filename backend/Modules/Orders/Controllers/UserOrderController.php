<?php
/**
 * Created by PhpStorm.
 * User: zhanghongbo
 * Date: 2020-07-15
 * Time: 18:48
 */

namespace backend\Modules\Orders\Controllers;


use backend\controllers\BaseController;
use Service\ServiceModules\ServiceUser\UserService;

class UserOrderController extends BaseController
{
    public function actionOrderLog()
    {
        echo 123;
        UserService::abc()->a();
    }
}