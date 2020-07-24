<?php
/**
 * Created by PhpStorm.
 * User: zhanghongbo
 * Date: 2020-07-24
 * Time: 16:21
 */
namespace console\controllers\DropTable;

class InitTableController extends \console\controllers\BaseController
{
    /**
     * php yii DropTable/init-table/run
     */
    public function actionRun()
    {
        \Yii::$app->db->createCommand()->dropTable('user');
        \Yii::$app->db->createCommand()->dropTable('migration');
        \Yii::$app->db->createCommand()->dropTable('menu');
        \Yii::$app->db->createCommand()->dropTable('customer');
        \Yii::$app->db->createCommand()->dropTable('config');
        \Yii::$app->db->createCommand()->dropTable('auth_assignment');
        \Yii::$app->db->createCommand()->dropTable('auth_item_child');
        \Yii::$app->db->createCommand()->dropTable('auth_item');
        \Yii::$app->db->createCommand()->dropTable('auth_rule');
    }
}