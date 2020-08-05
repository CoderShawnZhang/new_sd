<?php
/**
 * Created by PhpStorm.
 * User: zhanghongbo
 * Date: 2020-08-05
 * Time: 12:13
 */
namespace Service\ServiceModules\ServiceCustomer;

use Service\Ars\Tables\CustomerTable;
use Service\ServiceBase\Service;
use Service\ServiceModules\ServiceCustomer\Models\CustomerModel;
use Service\ServiceModules\ServiceCustomer\Models\CustomerWxModel;
use Service\ServiceOld\Models\OldCustomer;
use Service\ServiceOld\OldUserPartnerFastService;

class CustomerService extends Service
{
    /**
     * 将旧表数据转入新表
     *
     * @param $user_id
     * @return bool
     */
    public static function transDataCustomer($user_id)
    {
        if(self::checkUserExist($user_id)) {
//            var_dump('已经存在');
//            return false;
        }
        list($cur_role_id,$return_partner_fast,$cur_role_txt1) = OldUserPartnerFastService::getPartnerFastRole($user_id);
        list($return_fast_role_id,$return_partner_last,$cur_role_txt2) = OldUserPartnerFastService::getPartnerFastRole($return_partner_fast);

        $oldUser = OldCustomer::find()->where(['user_id' => $user_id])->one();
        $newModel = new CustomerModel();
        $newModel->c_id = $user_id;

        $newModel->user_name = $oldUser['user_name'];
        $newModel->password = md5(123456);
        $newModel->email = $oldUser['user_email'];
        $newModel->role = $cur_role_id;
        $newModel->parent_level_1 = $return_partner_fast;
        $newModel->parent_level_2 = $return_partner_last;
        $newModel->return_money_ratio = $oldUser['partner_rate'];
        $newModel->last_login_at = $oldUser['user_last_time'];
        $newModel->on_line = 0;
        $newModel->status = 1;
        $newModel->access_token = $oldUser['access_token'];
        $newModel->created_at = $oldUser['user_create_time'];
        $newModel->updated_at = $oldUser['user_update_time'];
        if($newModel->validate() && $newModel->save()){
            self::transDataCustomerWx($newModel->id,$user_id);
            var_dump('成功');
        } else {
            var_dump($newModel->getErrors());
        }
    }

    /**
     *
     */
    public function transDataCustomerCommon(){

    }

    /**
     * @param $customer_id
     * @param $user_id
     */
    public function transDataCustomerWx($customer_id,$user_id){
        $oldUser = OldCustomer::find()->where(['user_id' => $user_id])->one();
        $customerWx = new CustomerWxModel();
        $customerWx->customer_id = $customer_id;
        $customerWx->nickname = !isset($oldUser['user_nickname']) || empty($oldUser['user_nickname']) ? $oldUser['user_name'] : $oldUser['user_nickname'];
        $customerWx->wx_openid = $oldUser['wx_openid'];
        $customerWx->xcx_openid = $oldUser['wxconnect_openid'];
        $customerWx->unionId = isset($oldUser['wx_unionid']) ? $oldUser['wx_unionid'] : '';
        $customerWx->avatar_url = $oldUser['user_photo'];
        $customerWx->gender = $oldUser['user_sex'];
        $customerWx->province = isset($oldUser['user_province']) ? $oldUser['user_province'] : 0;
        $customerWx->city = isset($oldUser['user_city']) ? $oldUser['user_city'] : 0;
        $customerWx->mobile = isset($oldUser['user_mobile']) ? $oldUser['user_mobile'] : 0;
        $customerWx->watermark = '';
        $customerWx->is_wx_subscribe = $oldUser['wx_subscribe'];
        $customerWx->wx_subscribe_time = $oldUser['wx_subscribe_time'];
        $customerWx->created_at = time();
        $customerWx->updated_at = 0;
        if($customerWx->validate() && $customerWx->save()){
            var_dump('成功');
        } else {
            var_dump($customerWx->getErrors());
        }
    }
    /**
     * @param $user_id
     * @return bool
     */
    private static function checkUserExist($user_id)
    {
        $exist = CustomerModel::find()->where(['c_id'=>$user_id])->one();
        if(!empty($exist)){
            CustomerModel::deleteAll(['c_id'=>$user_id]);
        }
        return false;
    }
}