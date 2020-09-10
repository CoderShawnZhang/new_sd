<?php
/**
 * Created by PhpStorm.
 * User: zhanghongbo
 * Date: 2020-08-09
 * Time: 09:09
 */
namespace backend\Modules\User\Controllers;

use backend\controllers\BaseController;
use backend\Modules\User\Models\SelfUserModel;
use Yii;
use yii\helpers\ArrayHelper;

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
     *
     * @return array
     * @throws \Exception
     */
    public function actionData()
    {
        $this->formatJson();
        $condition = $this->getCondition();
        list($dataArray,$count) = SelfUserModel::getList($condition);
        return $this->layUiTableData($dataArray,$count,20);
    }

    /**
     * 获取查询条件
     *
     * @throws \Exception
     */
    private function getCondition()
    {
        $condition = [];
        $get = Yii::$app->request->get();
        if(!empty(ArrayHelper::getValue($get,'username',''))){
            $condition[] = ['username' => $get['username']];
        }
        return $condition;
    }
}