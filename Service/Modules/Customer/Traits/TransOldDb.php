<?php
namespace Service\Modules\Customer\Traits;

use Service\Modules\Customer\Models\CustomerCommonModel;
use Service\Modules\Customer\Models\CustomerModel;
use Service\Modules\Customer\Models\CustomerWxModel;
use Service\Modules\User\Models\Ar\UserIdentity;
use Service\Old\Models\OldCustomer;
use Service\Old\OldUserPartnerFastService;
trait TransOldDb
{
    /**
     * 将旧表数据转入新表
     *
     * @param $user_id
     * @throws \yii\base\Exception
     */
    public static function transDataCustomer($user_id)
    {
        list($cur_role_id,$return_partner_fast,) = OldUserPartnerFastService::getPartnerFastRole($user_id);
        list(,$return_partner_last,) = OldUserPartnerFastService::getPartnerFastRole($return_partner_fast);
        $oldUser = OldCustomer::find()->where(['user_id' => $user_id])->one();
        if(in_array($oldUser['user_rank_id'],[5,6,7,8,18,19,32])){
            self::transDataService($oldUser);
        }

        $newModel = new CustomerModel();
        $newModel->c_id = $user_id;
        $newModel->user_name = isset($oldUser['user_name']) ?$oldUser['user_name'] : $oldUser['user_nickname'];
        $newModel->password = md5(123456);
        $newModel->email = $oldUser['user_email'];
        $newModel->role = $cur_role_id;
        $newModel->parent_level_1 = $return_partner_fast;
        $newModel->parent_level_2 = $return_partner_last;
        $newModel->balance = $oldUser['user_money'];
        $newModel->red_balance = $oldUser['user_wallet'];
        $newModel->return_money_ratio = $oldUser['partner_rate'];
        $newModel->last_login_at = $oldUser['user_last_time'];
        $newModel->on_line = 0;
        $newModel->status = 1;
        $newModel->access_token = isset($oldUser['access_token']) ? $oldUser['access_token'] : '111111';
        $newModel->created_at = $oldUser['user_create_time'];
        $newModel->updated_at = $oldUser['user_update_time'];
        if($newModel->validate() && $newModel->save()){
            var_dump('成功' . $user_id);
            self::transDataCustomerWx($newModel->id,$oldUser);
        } else {
            var_dump($newModel->getErrors());
        }
    }

    /**
     * 用户副表
     *
     * @param $customer_id
     * @param $oldUser
     */
    public static function transDataCustomerCommon($customer_id,$oldUser){
        $customerCommon = new CustomerCommonModel();
        $customerCommon->customer_id = $customer_id;
        $customerCommon->service_id = $oldUser['service_id'];
        $customerCommon->order_buy_money = $oldUser['user_buymoney'];
        $customerCommon->order_refund_money = $oldUser['user_refund_money'];
        $customerCommon->order_count = $oldUser['user_order'];
        $customerCommon->this_month_buy_money = $oldUser['this_month_buymoney'];
        $customerCommon->last_month_buy_money = $oldUser['last_month_buymoney'];
        $customerCommon->three_month_buy_money = $oldUser['three_month_buymoney'];
        $customerCommon->is_three_money_buy = $oldUser['is_three_month_buy'];
        $customerCommon->is_year_buy = $oldUser['is_year_buy'];
        $customerCommon->status = 1;
        $customerCommon->last_login_time = 0;
        $customerCommon->last_buy_time = $oldUser['user_buy_time'];
        $customerCommon->is_address_transfer = $oldUser['is_address_transfer'];
        $customerCommon->is_store = $oldUser['is_store'];
        if($customerCommon->validate() && $customerCommon->save()){
            var_dump('成功');
        } else {
            var_dump($customerCommon->getErrors());
        }
    }

    /**
     * 用户微信表
     * @param $customer_id
     * @param $oldUser
     */
    public static function transDataCustomerWx($customer_id,$oldUser){
        $customerWx = new CustomerWxModel();
        $customerWx->customer_id = $customer_id;
        $customerWx->nickname = !isset($oldUser['user_nickname']) || empty($oldUser['user_nickname']) ? $oldUser['user_name'] : $oldUser['user_nickname'];
        $customerWx->wx_openid = isset($oldUser['wxconnect_openid']) ? $oldUser['wxconnect_openid'] : '';
        $customerWx->xcx_openid = isset($oldUser['wx_openid']) ? $oldUser['wx_openid']:'';
        $customerWx->unionId = isset($oldUser['wx_unionid']) ? $oldUser['wx_unionid'] : $oldUser['wxconnect_unionid'];
        $customerWx->avatar_url = $oldUser['user_photo'];
        $customerWx->gender = $oldUser['user_sex'];
        $customerWx->province = isset($oldUser['user_province']) ? $oldUser['user_province'] : 0;
        $customerWx->city = isset($oldUser['user_city']) ? $oldUser['user_city'] : 0;
        $customerWx->mobile = isset($oldUser['user_mobile']) ? intval($oldUser['user_mobile']) : 0;
        $customerWx->watermark = '';
        $customerWx->is_wx_subscribe = $oldUser['wx_subscribe'];
        $customerWx->wx_subscribe_time = $oldUser['wx_subscribe_time'];
        $customerWx->created_at = time();
        $customerWx->updated_at = 0;
        if($customerWx->validate() && $customerWx->save()){
            var_dump('成功');
            self::transDataCustomerCommon($customer_id,$oldUser);
        } else {
            var_dump($customerWx->getErrors());
        }
    }

    /**
     * @param $oldUser
     * @throws \yii\base\Exception
     */
    public static function transDataService($oldUser)
    {

        $model = new UserIdentity();
        $model->username = $oldUser['user_name'];

        $model->setPassword(111111);//md5(111111);
        $model->auth_key = '--';
        $model->password_reset_token = '--';
        $model->email = '--';
        $model->created_at = time();
        $model->updated_at = 0;
        if($model->validate() && $model->save()){
            var_dump('客服创建成功'.$model->id);
        } else {
            var_dump($model->getErrors());
        }
    }
}