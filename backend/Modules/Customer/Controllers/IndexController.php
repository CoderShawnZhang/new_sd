<?php
/**
 * Created by PhpStorm.
 * User: zhanghongbo
 * Date: 2020-08-05
 * Time: 17:07
 */
namespace backend\Modules\Customer\Controllers;

use backend\controllers\BaseController;
use Service\ServiceBase\Constants\UserMapping;
use Service\ServiceModules\ServiceCustomer\CustomerService;
use Service\ServiceModules\ServiceCustomer\Models\CustomerModel;
use yii\web\Response;

class IndexController extends BaseController
{
    public function actionIndex()
    {
        return $this->render('index');
    }

    public function actionData()
    {
        \Yii::$app->response->format = Response::FORMAT_JSON;
        $data = CustomerModel::find()->all();
        $dataArray = [];
        foreach($data as $key=>$val){
            $dataArray[$key] = $val->toArray();
            $dataArray[$key]['roleName'] = UserMapping::getUserRoleName()[$val['role']];
        }
//        $data = [
//            ['id' => 1,'username' => 'aaaa'],
//            ['id' => 1,'username' => 'aaaa']
//        ];

        $pageInfo = [
            'limit' => 10,
            'page_current' => 1,
            'page_num' => count($data)/10
        ];
        return $list = [
            'code'  => 0,
            'msg'   => '提示信息',
            'count' => count($data),
            'info'  => $pageInfo,
            'data'  => $dataArray,
        ];
    }
}