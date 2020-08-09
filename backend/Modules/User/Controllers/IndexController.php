<?php
/**
 * Created by PhpStorm.
 * User: zhanghongbo
 * Date: 2020-08-09
 * Time: 09:09
 */
namespace backend\Modules\User\Controllers;

use backend\controllers\BaseController;
use Service\ServiceModules\ServiceUser\UserService;
use yii\web\Response;

/**
 * Class IndexController
 * @package backend\Modules\User\Controllers
 */
class IndexController extends BaseController
{
    public function actionIndex()
    {
        return $this->render('index');
    }

    public function actionData()
    {
        \Yii::$app->response->format = Response::FORMAT_JSON;

        $customerService = UserService::getCustomerService();
        $list = $customerService->getList();
        $count = $customerService->getCount();
        $dataArray = [];
        foreach($list as $key => $val){
            $dataArray[$key] = $val->toArray();
            $dataArray[$key]['score'] = 100;
        }
        return $this->layUiTableData($dataArray,$count,20);
    }
}