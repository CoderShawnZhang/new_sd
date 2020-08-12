<?php
namespace console\controllers\TransferData;

use console\controllers\BaseController;
use Service\Base\Constants\CustomerConstant;
use Service\Base\Constants\CustomerMapping;
use Service\Exception\BaseException;
use Service\Modules\Customer\CustomerService;
use Service\Modules\Customer\Models\CustomerModel;
use Service\Modules\Customer\Models\CustomerRoleModel;
use Service\Old\Models\OldCustomer;
use yii\helpers\ArrayHelper;

/**
 * Class UserTableController
 */
class UserTableController extends BaseController
{

    /**
     * @return array
     */
    private function getWhere()
    {
        $user_ids =  CustomerModel::find()->all();
        if(empty($user_ids)){
            return [];
        }
        return ['not in','user_id',ArrayHelper::getColumn($user_ids,'c_id')];
    }

    /**
     * 初始化角色表
     */
    private function initRoleData()
    {
        $roleList = CustomerMapping::getCustomerRoleList();
        foreach($roleList as $key => $val){
            $find = CustomerRoleModel::find()->where(['id' => $key])->one();
            if(!empty($find)){
                continue;
            }
            $model = new CustomerRoleModel();
            $insertData = [
                'id' => $key,
                'name' => $val,
                'status' => 1
            ];
            if(!$model->load($insertData,'') || !$model->validate()){
                var_dump($model->getErrors());die;
            }
            if(!$model->save()){
                var_dump($model->getErrors());die;
            }
            $this->echoLine('创建角色:【' . $val . '】成功');
        }
    }

    /**
     * php yii TransferData/user-table/index
     * 测试结构！
     */
    public function actionIndex()
    {
        $this->initRoleData();
        ini_set('memory_limit', -1);
        $model = OldCustomer::find()->where($this->getWhere());
        $list = $model->orderBy('user_id asc')->limit(500)->all();
        try{
            if($model->count() == 0){
                throw new BaseException('异常信息',1001);
            }
            foreach($list as $key => $val){
                CustomerService::transDataCustomer($val['user_id']);
            }
        } catch (\Exception $e){
            var_dump($e->getMessage());
        }
    }
}