<?php
/**
 * Created by PhpStorm.
 * User: zhanghongbo
 * Date: 2020-07-18
 * Time: 16:45
 */
namespace console\controllers\ProjectInit;

use console\controllers\BaseController;
use console\models\MenuAr;
use Service\Helper\ConfigService;
use Service\Helper\Models\Ar\ConfigAr;
use yii\widgets\Menu;

class InitMenuRawController extends BaseController
{
    /**
     * 执行RBAC菜单初始化
     * php yii ProjectInit/init-menu-raw/run
     */
    public function actionRun()
    {
        $trans = \Yii::$app->db->beginTransaction();
        try{
            $rbacMenuArray = $this->getMenu(0);
            $parent =  $rbacMenuArray['parent'];
            $menu = new MenuAr();
            $menu->load($parent,'');
            $insertParentRes = $menu->save();
            if(!$insertParentRes){
                throw new \Exception($menu->getErrors());
            } else {
                $parent_id = \Yii::$app->db->getLastInsertID();
                $this->echoLine('=================================');
                $this->echoLine('= 初始化RBAC(开发使用)菜单成功 =');
                $this->echoLine('=================================');
            }
            $rbacMenuArray = $this->getMenu($parent_id);
            $data = $rbacMenuArray['children'];
            foreach($data as $key => $val){
                $menu = new MenuAr();
                $menu->load($val,'');
                $res = $menu->save();
                if(!$res) {
                    throw new \Exception($menu->getErrors());
                }
                $this->echoLine('= '.$val['name'].' =');
            }
            $this->echoLine('============');
            $trans->commit();
        } catch (\Exception $e){
            $trans->rollBack();
            $this->echoLine($e->getMessage());
        }
    }

    /**
     * RBAC菜单
     * @param $parent_id
     * @return array
     */
    private function getMenu($parent_id)
    {
        return [
            'parent' => ['name' => 'RBAC(开发使用)', 'parent' => ConfigService::getTopInitMenu(), 'route' => '', 'order'=>'', 'data'=>'{"icon":"layui-icon-auz"}' ,'type_name' => 'rbac'],
            'children' => [
                ['name' => '角色列表', 'parent' => $parent_id, 'route' => '/admin/role/index', 'order' => 1, 'data' => '{"icon":"layui-icon-set"}' ,'type_name' => 'rbac'],
                ['name' => '分配角色', 'parent' => $parent_id, 'route' => '/admin/assignment/index', 'order' => 2, 'data' => '{"icon":"layui-icon-set"}' ,'type_name' => 'rbac'],
                ['name' => '权限列表', 'parent' => $parent_id, 'route' => '/admin/permission/index', 'order' => 3, 'data'=> '{"icon":"layui-icon-set"}' ,'type_name' => 'rbac'],
                ['name' => '路由列表', 'parent' => $parent_id, 'route' => '/admin/route/index', 'order' => 4, 'data' => '{"icon":"layui-icon-set"}' ,'type_name' => 'rbac'],
                ['name' => '规则列表', 'parent' => $parent_id, 'route' => '/admin/rule/index', 'order' => 5, 'data' => '{"icon":"layui-icon-set"}' ,'type_name' => 'rbac'],
                ['name' => '菜单列表', 'parent' => $parent_id, 'route' => '/admin/menu/index', 'order' => 6, 'data' => '{"icon":"layui-icon-set"}' ,'type_name' => 'rbac']
            ]
        ];
    }
}