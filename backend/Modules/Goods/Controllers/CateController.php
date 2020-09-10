<?php
/**
 * Created by PhpStorm.
 * User: zhanghongbo
 * Date: 2020-08-24
 * Time: 15:30
 */

namespace backend\Modules\Goods\Controllers;

use backend\controllers\BaseController;

class CateController extends BaseController
{
    public function actionIndex()
    {
//        echo phpinfo();
        return $this->render('index');
    }
}