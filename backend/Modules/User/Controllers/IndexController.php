<?php
/**
 * Created by PhpStorm.
 * User: zhanghongbo
 * Date: 2020-08-09
 * Time: 09:09
 */
namespace backend\Modules\User\Controllers;

use backend\controllers\BaseController;
use backend\Modules\User\Models\UserModel;

/**
 * Class IndexController
 * @package backend\Modules\User\Controllers
 */
class IndexController extends BaseController
{
    /**
     * @return string
     */
    public function actionIndex()
    {
        return $this->render('index');
    }

    /**
     * 获取客服列表
     * @return array
     */
    public function actionData()
    {
        $this->formatJson();
        $condition = ['username' => '蒋月月'];
        list($dataArray,$count) = UserModel::getList($condition);
        return $this->layUiTableData($dataArray,$count,20);
    }
}