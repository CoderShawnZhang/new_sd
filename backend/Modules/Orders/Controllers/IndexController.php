<?php
/**
 * Created by PhpStorm.
 * User: zhanghongbo
 * Date: 2020-07-15
 * Time: 16:25
 */
namespace backend\Modules\Orders\Controllers;

use backend\controllers\BaseController;
use yii\web\Response;

class IndexController extends BaseController
{
    public function actionIndex()
    {
        return $this->render('index');
    }

    public function actionData(){
        \Yii::$app->response->format = Response::FORMAT_JSON;
        $data = [
            ['id' => 1,'username' => 'aaaa'],
            ['id' => 1,'username' => 'aaaa']
        ];

        $pageInfo = [
            'limit' => 3,
            'page_current' => 3,
            'page_num' => 20
        ];
        return $list = [
            'code'  => 0,
            'msg'   => '提示信息',
            'count' => 190,//共多少条
            'info'  => $pageInfo,
            'data'  => $data,
        ];
    }
}