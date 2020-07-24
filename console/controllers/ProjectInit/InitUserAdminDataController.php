<?php
/**
 * 创建管理员账号
 * Created by PhpStorm.
 * User: zhanghongbo
 * Date: 2020-07-24
 * Time: 14:44
 */

namespace console\controllers\ProjectInit;

use Service\ServiceModules\ServiceUser\Models\Ar\UserAr;


/**
 * Class InitUserAdminDataController
 * @package console\controllers\ProjectInit
 */
class InitUserAdminDataController extends \console\controllers\BaseController
{
    /**
     * php yii ProjectInit/init-user-admin-data/run
     */
    public function actionRun()
    {
        $user = new UserAr();
        if($user->load($this->getData(),'')){
           $res = $user->save();
           if($res){
               $this->echoLine('账号创建成功:id='.$res);die;
           }
        }
        $this->echoLine('创建失败');
    }

    /**
     * @throws \yii\db\Exception
     */
    public function actionRun1()
    {
        $res = \Yii::$app->db->createCommand()->insert('user',$this->getData())->execute();
        if($res){
            $this->echoLine('账号创建成功:id='.$res);
        }
        $this->echoLine('创建失败');
    }

    private function getData()
    {
        return [
            'username' => 'admin',
            'password' => md5(111111),
            'status' => 0,
            'created_at' => time()
        ];
    }
}