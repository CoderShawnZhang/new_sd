<?php
namespace console\controllers\TransferData;

use console\controllers\BaseController;
use console\models\old_db\Test;
use Service\Exception\BaseException;
use Service\ServiceBase\Constants\UserMapping;
use Service\ServiceModules\ServiceCustomer\CustomerService;
use Service\ServiceModules\ServiceCustomer\Models\CustomerModel;
use Service\ServiceOld\Models\OldCustomer;
use Service\ServiceOld\Models\OldUser;
use Service\ServiceOld\OldUserPartnerFastService;
use Service\ServiceOld\OldUserService;
use yii\helpers\ArrayHelper;

/**
 * Class UserTableController
 */
class UserTableController extends BaseController
{

    private function getWhere()
    {
        $user_ids =  CustomerModel::find()->all();
        if(empty($user_ids)){
            return [];
        }
        return ['not in','user_id',ArrayHelper::getColumn($user_ids,'c_id')];
    }
    /**
     * php yii TransferData/user-table/index
     * 测试结构！
     */
    public function actionIndex()
    {
        ini_set('memory_limit', -1);
//        var_dump($this->getWhere());die;
//        CustomerService::transDataCustomer(123);
//        $user_id = 1033644;
        $model = OldCustomer::find()->where($this->getWhere());
//        var_dump($model->createCommand()->getRawSql());die;
//        $list = $model->where(['in','user_id',[1033881,1033889,1033861,1029638]])->all();
        $list = $model->orderBy('user_id asc')->limit(500)->all();
//        $list = $model->where(['in','user_id',[800089]])->all();
//        $trans = \Yii::$app->db->beginTransaction();
        try{
            if($model->count() == 0){
                throw new BaseException('异常信息',1001);
            }
            foreach($list as $key => $val){
                CustomerService::transDataCustomer($val['user_id']);
            }
//            $trans->commit();
        } catch (\Exception $e){
            var_dump($e->getMessage());
//            $trans->rollBack();
        }
    }
}