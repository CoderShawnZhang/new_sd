<?php
/**
 * Created by PhpStorm.
 * User: zhanghongbo
 * Date: 2020-08-23
 * Time: 17:04
 */

namespace backend\Modules\Goods\Controllers;


use backend\controllers\BaseController;

class ParamsController extends BaseController
{
    public function actionIndex()
    {
        return $this->render('index');
    }
}