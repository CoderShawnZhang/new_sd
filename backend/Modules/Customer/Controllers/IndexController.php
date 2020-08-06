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

        $offset = ($page-1)*$limit;
//        var_dump($offset);die;
//        $pagination = new Pagination();
//        $pagination->offset = $page;
//        $pagination->limit = $limit;
        $list = $model->offset($offset)->limit($limit)->orderBy('c_id asc')->all();
        $count = $model->count();
        $dataArray = [];
        foreach($list as $key=>$val){
            $dataArray[$key] = $val->toArray();
            $dataArray[$key]['roleName'] = $this->getRoleStyleHtml($val['role']);
            $dataArray[$key]['is_auth_txt'] = $val['is_auth'] == 1 ? '已认证' : '未认证';
            $parent_level_1 =  CustomerModel::find()->where(['c_id'=>$val['parent_level_1']])->one();
            $dataArray[$key]['parent_level_1_txt'] = '--';
            $dataArray[$key]['parent_1_user_name'] = '--';
            $dataArray[$key]['parent_level_2_txt'] = '--';
            $dataArray[$key]['parent_2_user_name'] = '--';
            if(!empty($parent_level_1)){
                $dataArray[$key]['parent_1_user_name'] = $parent_level_1['user_name'];
                $dataArray[$key]['parent_level_1_txt'] = $this->getRoleStyleHtml($parent_level_1['role']);
            }
            $parent_level_2 =  CustomerModel::find()->where(['c_id'=>$val['parent_level_2']])->one();
            if(!empty($parent_level_2)) {
                $dataArray[$key]['parent_2_user_name'] = $parent_level_2['user_name'];
                $dataArray[$key]['parent_level_2_txt'] = $this->getRoleStyleHtml($parent_level_2['role']);
            }
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
            'msg'   => '',
            'count' => $count/2,
            'info'  => $pageInfo,
            'data'  => $dataArray,
        ];
    }

    private function getRoleStyleHtml($role_id)
    {
        $roleStyle = UserService::getRoleStyle($role_id);
        $roleName = UserMapping::getUserRoleName($role_id);
        return '<span class="'.$roleStyle.'">'.$roleName.'</span>';
    }
}