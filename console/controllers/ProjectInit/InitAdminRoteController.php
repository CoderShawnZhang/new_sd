<?php
/**
 * Created by PhpStorm.
 * User: zhanghongbo
 * Date: 2020-07-24
 * Time: 18:12
 */

namespace console\controllers\ProjectInit;

use console\controllers\BaseController;
use Service\Ars\Tables\UserTable;
use Service\ServiceModules\ServiceUser\Models\UserModel;

/**
 * 初始化配置管理员角色权限
 *
 * php yii ProjectInit/init-admin-rote/run
 * Class InitAdminRoteController
 * @package console\controllers\ProjectInit
 * @see https://www.cnblogs.com/longzhankunlun/p/6261407.html
 */
class InitAdminRoteController extends BaseController
{
    /**
     * php yii ProjectInit/init-admin-rote/run
     *
     * @throws \yii\base\Exception
     * @throws \Exception
     */
    public function actionRun()
    {
        $this->clear();
        $auth = \Yii::$app->authManager;

        //创建角色
        $admin = $auth->createRole('管理员');
        $auth->add($admin);

        //创建权限
        $all = $auth->createPermission('/*');
        $auth->add($all);
        //创建权限
        $leftMenu = $auth->createPermission('/site/left-menu');
        $auth->add($leftMenu);
        //创建权限
        $topMenu = $auth->createPermission('/site/top-menu');
        $auth->add($topMenu);

        //auth_item_child 角色->权限
        $auth->addChild($admin,$all);
        $auth->addChild($admin,$leftMenu);
        $auth->addChild($admin,$topMenu);

        //分配
        $user = UserModel::find()->where(['username' => 'admin'])->one();
        $auth->assign($admin,$user['id']);

        $this->echoLine('~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~');
        $this->echoLine('~ 管理员角色创建成功并分配admin账号 ~');
        $this->echoLine('~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~');
    }

    /**
     * 清理初始化管理员权限
     */
    private function clear()
    {
//        $auth = \Yii::$app->authManager;
//        $auth->removeAllAssignments();//auth_assignment
//        $auth->removeAllPermissions();//auth_item
//        $admin = $auth->getRole('管理员');
//        if(!empty($admin)){
//            $auth->removeChildren($admin);//auth_item_child
//        }
//        $auth->removeAllRoles();
    }
}