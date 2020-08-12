<?php
/**
 * Created by PhpStorm.
 * User: zhanghongbo
 * Date: 2020-08-05
 * Time: 17:07
 */
namespace backend\Modules\Customer\Controllers;

use backend\controllers\BaseController;
use Service\Base\Constants\CustomerMapping;
use Service\Helper\UserService;
use Service\Modules\Customer\Models\CustomerModel;
use yii\helpers\ArrayHelper;
use yii\web\Response;

class IndexController extends BaseController
{
    public function actionIndex()
    {
        return $this->render('index');
    }

    /**
     * @return array
     * @throws \Exception
     */
    public function actionData()
    {
        $get = \Yii::$app->request->get();
        $page = ArrayHelper::getValue($get,'page',1);
        $limit = 20;
        \Yii::$app->response->format = Response::FORMAT_JSON;
        $model = CustomerModel::find();
        $offset = ($page-1)*$limit;
        $list = $model->offset($offset)->limit($limit)->orderBy('c_id asc')->all();
        $count = $model->count();
        $dataArray = [];
        foreach($list as $key=>$val){
            $itemModel = $val;
            $dataArray[$key] = $val->toArray();
            $service_name = '无';
            if(!empty($itemModel->customerCommon->customerService)){
                $service_name = $itemModel->customerCommon->customerService->user_name;
            }
            $dataArray[$key]['service_txt'] = $service_name;

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

            $dataArray[$key]['created_at'] = date('Y-m-d H:i:s',$val['created_at']);
        }
        return $this->layUiTableData($dataArray,$count,$limit);
    }

    public function actionEdit()
    {
        return $this->render('edit');
    }

    /**
     * @param $role_id
     * @return string
     */
    private function getRoleStyleHtml($role_id)
    {
        $roleStyle = UserService::getRoleStyle($role_id);
        $roleName = CustomerMapping::getUserRoleName($role_id);
        return '<span class="'.$roleStyle.'">'.$roleName.'</span>';
    }
}