<?php
namespace backend\Modules\Goods\Controllers;

use backend\controllers\BaseController;
use Service\Modules\GoodsModule\GoodsService;
use yii\data\Pagination;
use yii\web\Response;

/**
 * Site controller
 */
class IndexController extends BaseController
{
    public function actionTest()
    {
        $this->layout = false;
        return $this->render('test');
    }

    public function actionIndex()
    {
	    $t =  GoodsService::test();
	    $list = GoodsService::getList();
        $dataProvider = GoodsService::getProvider();

        $pages = new Pagination(['totalCount' =>count($list), 'pageSize' => '3']);    //实例化分页类,带上参数(总条数,每页显示条数)
		return $this->render('index',[
            't' => ['a'=>222,'b'=>$t],
            'list' => $list,
            'dataProvider' =>$dataProvider,
            'pages' => $pages
        ]);
	}
    public function actionIndex1()
    {
        $t =  GoodsService::test();
        $list = GoodsService::getList();
        $dataProvider = GoodsService::getProvider();

        $pages = new Pagination(['totalCount' =>count($list), 'pageSize' => '3']);    //实例化分页类,带上参数(总条数,每页显示条数)
        return $this->render('index1',[
            't' => ['a'=>222,'b'=>$t],
            'list' => $list,
            'dataProvider' =>$dataProvider,
            'pages' => $pages
        ]);
    }


	public function actionLaylist()
    {
        \Yii::$app->response->format = Response::FORMAT_JSON;
        $data = GoodsService::getList();
        $count = GoodsService::getCount();
        $limit = 10;
        $info = [
            'limit'        => $limit,
            'page_current' => 1,
            'page_sum'     => ceil($count / $limit),
        ];
        $list = [
            'code'  => 0,
            'msg'   => '',
            'count' => $count,
            'info'  => $info,
            'data'  => $data,
        ];
        return $list;
    }
}