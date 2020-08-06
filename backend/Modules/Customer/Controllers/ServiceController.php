<?php
/**
 * Created by PhpStorm.
 * User: zhanghongbo
 * Date: 2020-08-06
 * Time: 10:04
 */

namespace backend\Modules\Customer\Controllers;


use backend\controllers\BaseController;

class ServiceController extends BaseController
{
    /**
     * @return string|void
     */
    public function actionIndex()
    {
        return $this->render('index');
    }
}