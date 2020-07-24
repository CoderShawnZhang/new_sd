<?php
/**
 * Created by PhpStorm.
 * User: zhanghongbo
 * Date: 2020-07-22
 * Time: 10:53
 */

namespace console\controllers\ProjectInit;


use console\controllers\BaseController;
use console\models\MenuAr;
use Service\ServiceHelper\Models\Ar\ConfigAr;

class InitTopMenuController extends BaseController
{
    /**
     *  php yii ProjectInit/init-top-menu/run
     */
    public function actionRun()
    {
        $trans = \Yii::$app->db->beginTransaction();
        try {
            $menu = new MenuAr();
            if ($menu->load($this->getMenu(), '')) {
                $res = $menu->save();
                if ($res) {
                    $this->echoLine('===================');
                    $this->echoLine('= 初始化top菜单成功 =');
                    $this->echoLine('===================');
                } else {
                    throw new \Exception('初始化top菜单失败');
                }
            }
            $config = new ConfigAr();
            $config->key = 'top_menu_init';
            $config->value = $menu->id;
            $config->desc  = '初始化默认显示顶部菜单名称';
            $res1 = $config->save();
            if(!$res1){
                throw new \Exception('初始化默认显示顶部菜单失败');
            }
            $trans->commit();
        }catch (\Exception $e) {
            $trans->rollBack();
            $this->echoLine($e->getMessage());
        }
    }

    private function getMenu()
    {
        return [
            'name' => '系统设置',
            'parent' => '',
            'route' => '',
            'order'=>'',
            'data'=>'{"icon":"layui-icon-auz","type_name":"top","show_child":"false"}' ,
            'type_name' => 'top'
        ];
    }
}