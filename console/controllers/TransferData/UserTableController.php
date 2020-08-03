<?php
namespace console\controllers\TransferData;

use console\controllers\BaseController;
use console\models\old_db\Test;
use Service\Exception\BaseException;
use Service\ServiceBase\Constants\UserMapping;
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
        $user_id = 1033644;
        $model = OldUser::find();

        $trans = \Yii::$app->db->beginTransaction();
        try{
            $userInfo = $model->where(['user_id'=>$user_id])->one();
            if(empty($userInfo)){
                throw new BaseException('异常信息',1001);
            }
            list($role_id,$partner_fast,$cur_role_txt1) = OldUserPartnerFastService::getPartnerFastRole($userInfo->user_id);
            list($role_id,$partner_last,$cur_role_txt2) = OldUserPartnerFastService::getPartnerFastRole($partner_fast);
            list($role_id,$partner_sast,$cur_role_txt3) = OldUserPartnerFastService::getPartnerFastRole($partner_last);
            $trans->commit();
        } catch (\Exception $e){
            $trans->rollBack();
        }
    }
}