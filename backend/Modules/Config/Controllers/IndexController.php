<?php
/**
 * Created by PhpStorm.
 * User: zhanghongbo
 * Date: 2020-07-26
 * Time: 14:28
 */
namespace backend\Modules\Config\Controllers;

use backend\controllers\BaseController;
use Service\ServiceHelper\ConfigService;

/**
 * Class IndexController
 * @package backend\Modules\Config\Controllers
 */
class IndexController extends BaseController
{
    /**
     * @return string|void
     */
    public function actionIndex()
    {
        $selected_id = 1;
        $list = [
            ['id' => 1,'name' => '1111'],
            ['id' => 2,'name' => '2222']
        ];
        $condition = [
            'data'=>'top'
        ];
//        $menu = MenuAr::find()->where("data LIKE '%\"top\"%'")->orderBy('order asc')->all();
        $list = ConfigService::searchConfig()->getConfigSearch()->getList($condition);
        var_dump($list);die;
        return $this->render('index',['list' => $list,'selected_id'=> $selected_id]);
    }

    /**
     *
     */
    public function actionUpdate()
    {
        $post = $this->request->post();
        var_dump($post);
    }
}