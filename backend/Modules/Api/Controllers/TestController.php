<?php
/**
 * Created by PhpStorm.
 * User: zhanghongbo
 * Date: 2020-08-14
 * Time: 16:30
 */
namespace backend\Modules\Api\Controllers;

use backend\controllers\BaseController;

class TestController extends BaseController
{
    /**
     * @return string
     */
    public function actionTest()
    {
        $data = [];
        $data['url'] = 'dengbeiapi.local.alwooo.com/v1/index/abc';
        return $this->render('index');
    }
}