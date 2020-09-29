<?php
/**
 * Created by PhpStorm.
 * User: zhanghongbo
 * Date: 2020-08-09
 * Time: 09:09
 */
namespace backend\Modules\Swoole\Controllers;

use backend\controllers\BaseController;

class WebsocketController extends BaseController
{
    public function actionIndex()
    {
        return $this->render('index');
    }
}