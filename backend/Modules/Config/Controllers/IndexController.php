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
use Service\ServiceModules\ServiceMenu\ServiceMenu;

/**
 * Class IndexController
 * @package backend\Modules\Config\Controllers
 */
class IndexController extends BaseController
{
    /**
     * @return string
     */
    public function actionIndex()
    {
        $selected_id = ConfigService::getTopInitMenu();
        $list = ServiceMenu::getTopMenuList();
        return $this->render('index',['list' => $list,'selected_id'=> $selected_id]);
    }

    /**
     *
     */
    public function actionUpdate()
    {
        $post = $this->request->post();
        $value = $post['init_top_menu'];
        ConfigService::setValue('top_menu_init',$value);
        //TODO 通过切面记录日志(所有)
    }
}