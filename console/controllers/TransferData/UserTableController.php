<?php
namespace console\controllers\TransferData;

use console\controllers\BaseController;
use console\models\old_db\Test;
use Service\Exception\BaseException;
use Service\ServiceBase\Constants\UserMapping;
use Service\ServiceModules\ServiceCustomer\CustomerService;
use Service\ServiceOld\Models\OldCustomer;
use Service\ServiceOld\Models\OldUser;
use Service\ServiceOld\OldUserPartnerFastService;
use Service\ServiceOld\OldUserService;

/**
 * Class UserTableController
 */
class UserTableController extends BaseController
{
    /**
     * php yii TransferData/user-table/index
     * 测试结构！
     */
    public function actionIndex()
    {
//        CustomerService::transDataCustomer(123);
//        $user_id = 1033644;
        $model = OldCustomer::find();
//        $list = $model->where(['in','user_id',[1033884,1033883,1033882]])->all();
        $list = $model->where(['in','user_id',[1033881,1033889,1033861,1024600]])->all();
        $trans = \Yii::$app->db->beginTransaction();
        try{
            if(empty($list)){
                throw new BaseException('异常信息',1001);
            }
            foreach($list as $key => $val){
                CustomerService::transDataCustomer($val['user_id']);
            }
            $trans->commit();
        } catch (\Exception $e){
            $trans->rollBack();
        }
    }
}