<?php
namespace backend\controllers;

use Yii;
use yii\web\Controller;
use yii\filters\VerbFilter;
use yii\filters\AccessControl;
use common\models\LoginForm;
use yii\web\Response;

/**
 * 顶层基类
 */
class BaseController extends Controller
{
	public $layout = '@app/views/layouts/iframeMain.php';

	public function actionIndex()
    {
        $user = Yii::$app->getUser();
        if ($user->getIsGuest()) {
            $user->loginRequired();
        } else {
            $this->redirect(['site/index']);
        }
    }

    /**
     *
     */
    public function formatJson()
    {
        \Yii::$app->response->format = Response::FORMAT_JSON;
    }

    /**
     * @param $dataArray
     * @param $count
     * @param int $limit
     * @return array
     */
    public function layUiTableData($dataArray,$count,$limit = 20)
    {
        empty($dataArray) ? $msg = '暂无数据！' : $msg = '查询成功！';
        $pageInfo = [
            'limit' => $limit,
            'page_current' => 1,
            'page_num' => ceil($count / $limit)
        ];
        return $list = [
            'code'  => 0,
            'msg'   => $msg,
            'count' => $count,
            'info'  => $pageInfo,
            'data'  => $dataArray,
        ];
    }
}