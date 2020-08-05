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
use Service\ServiceHelper\UserService;
use Service\ServiceModules\ServiceCustomer\CustomerService;
use Service\ServiceModules\ServiceCustomer\Models\CustomerModel;
use yii\data\Pagination;
use yii\helpers\ArrayHelper;
use yii\web\Response;

class IndexController extends BaseController
{
    public function actionIndex()
    {
        return $this->render('index');
    }

    public function actionData()
    {
//        var_dump(\Yii::$app->request->get());
        $get = \Yii::$app->request->get();
        $page = ArrayHelper::getValue($get,'page',1);
        $limit = 20;


        \Yii::$app->response->format = Response::FORMAT_JSON;
        $model = CustomerModel::find();

//        $pagination = new Pagination();
//        $pagination->offset = $page;
//        $pagination->limit = $limit;
        $list = $model->offset($page)->limit($limit)->orderBy('role asc')->all();
        $count = $model->count();
        $dataArray = [];
        foreach($list as $key=>$val){
            $dataArray[$key] = $val->toArray();
            $dataArray[$key]['roleName'] = '<span class="'.UserService::getRoleStyle()[$val['role']].'">'.UserMapping::getUserRoleName()[$val['role']].'</span>';
        }
//        $data = [
//            ['id' => 1,'username' => 'aaaa'],
//            ['id' => 1,'username' => 'aaaa']
//        ];

        $pageInfo = [
            'limit' => $limit,
            'page_current' => 1,
            'page_num' => $count/$limit
        ];
        return $list = [
            'code'  => 0,
            'msg'   => '提示信息',
            'count' => $count,
            'info'  => $pageInfo,
            'data'  => $dataArray,
        ];
    }
}