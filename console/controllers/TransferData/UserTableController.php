<?php
namespace console\controllers\TransferData;

use console\models\old_db\Test;
use Service\Exception\BaseException;

/**
 * Class UserTableController
 */
class UserTableController extends \yii\console\Controller
{
    /**
     * 测试结构！
     */
    public function actionIndex()
    {
        $model = Test::find();
        $trans = \Yii::$app->db->beginTransaction();
        try{
            $list = $model->self()->one();
            if(empty($list)){
                throw new BaseException('异常信息',1001);
            }
            $trans->commit();
        } catch (\Exception $e){
            $trans->rollBack();
        }

    }
}