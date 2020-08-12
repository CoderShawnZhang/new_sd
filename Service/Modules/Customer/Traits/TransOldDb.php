<?php
namespace Service\Modules\Customer\Traits;

use Service\Modules\Customer\Models\CustomerCommonModel;
use Service\Modules\Customer\Models\CustomerModel;
use Service\Modules\Customer\Models\CustomerWxModel;
use Service\Modules\User\Models\Ar\UserIdentity;
use Service\Old\Models\OldCustomer;
use Service\Old\OldUserPartnerFastService;
use Service\Helper\Tools\ArrayHelper;

trait TransOldDb
{
    /**
     * 将旧表数据转入新表
     *
     * @param $user_id
     * @return bool
     * @throws \yii\base\Exception|\Exception
     */
    public static function transDataCustomer($user_id)
    {
        if(empty($user_id) || $user_id == 0){
            return false;
        }
        list($cur_role_id,$return_partner_fast,) = OldUserPartnerFastService::getPartnerFastRole($user_id);
        list(,$return_partner_last,) = OldUserPartnerFastService::getPartnerFastRole($return_partner_fast);
        $oldUser = OldCustomer::find()->where(['user_id' => $user_id])->one();

        //过滤客服导入用户表
        if(in_array($oldUser['user_rank_id'],[5,6,7,8,18,19,32])){
            self::transDataService($oldUser);
        }

        $customer = new CustomerModel();
        $customer->c_id = $user_id;
        $customer->user_name = ArrayHelper::getValue($oldUser,'user_name','');
        $customer->password = md5(123456);
        $customer->email = ArrayHelper::getValue($oldUser,'user_email','');
        $customer->role = $cur_role_id;
        $customer->parent_level_1 = $return_partner_fast;
        $customer->parent_level_2 = $return_partner_last;
        $customer->balance = ArrayHelper::getValue($oldUser,'user_money',0);
        $customer->red_balance = ArrayHelper::getValue($oldUser,'user_wallet',0);
        $customer->return_money_ratio = ArrayHelper::getValue($oldUser,'partner_rate',0);
        $customer->on_line = 0;
        $customer->status = 1;
        $customer->access_token = isset($oldUser['access_token']) ? $oldUser['access_token'] : '--';
        $customer->created_at = ArrayHelper::getValue($oldUser,'user_create_time',0);
        $customer->updated_at = ArrayHelper::getValue($oldUser,'user_update_time',0);
        if($customer->validate() && $customer->save()){
            echo 'customer -- 成功';
            self::transDataCustomerWx($customer->id,$oldUser);
        } else {
            var_dump($customer->getErrors());
        }
    }

    /**
     * 用户副表
     *
     * @param $customer_id
     * @param $oldUser
     * @throws \Exception
     */
    public static function transDataCustomerCommon($customer_id,$oldUser){
        $customerCommon = new CustomerCommonModel();
        $customerCommon->customer_id = $customer_id;
        $customerCommon->service_id =  ArrayHelper::getValue($oldUser,'service_id',0);
        $customerCommon->order_buy_money = ArrayHelper::getValue($oldUser,'user_buymoney',0);
        $customerCommon->order_refund_money = ArrayHelper::getValue($oldUser,'user_refund_money',0);
        $customerCommon->order_count = ArrayHelper::getValue($oldUser,'user_order',0);
        $customerCommon->this_month_buy_money = ArrayHelper::getValue($oldUser,'this_month_buymoney',0);
        $customerCommon->last_month_buy_money = ArrayHelper::getValue($oldUser,'last_month_buymoney',0);
        $customerCommon->three_month_buy_money = ArrayHelper::getValue($oldUser,'three_month_buymoney',0);
        $customerCommon->is_three_money_buy = ArrayHelper::getValue($oldUser,'is_three_month_buy',0);
        $customerCommon->is_year_buy = ArrayHelper::getValue($oldUser,'is_year_buy',0);
        $customerCommon->status = 1;
        $customerCommon->last_login_time = ArrayHelper::getValue($oldUser,'user_last_time',0);
        $customerCommon->last_buy_time = ArrayHelper::getValue($oldUser,'user_buy_time',0);
        $customerCommon->is_address_transfer = ArrayHelper::getValue($oldUser,'is_address_transfer',0);
        $customerCommon->is_store = ArrayHelper::getValue($oldUser,'is_store',0);
        if($customerCommon->validate() && $customerCommon->save()){
           echo 'customerCommon -- 成功';
        } else {
            var_dump($customerCommon->getErrors());
        }
    }

    /**
     * 用户微信表
     *
     * @param $customer_id
     * @param $oldUser
     * @throws \Exception
     */
    public static function transDataCustomerWx($customer_id,$oldUser){
        $customerWx = new CustomerWxModel();
        $customerWx->customer_id = $customer_id;
        $user_name = ArrayHelper::getValue($oldUser,'user_name','--');
        $user_nickname = ArrayHelper::getValue($oldUser,'user_nickname',$user_name);
        $customerWx->nickname = $user_nickname;
        $customerWx->wx_openid = ArrayHelper::getValue($oldUser,'wxconnect_openid','');
        $customerWx->xcx_openid = ArrayHelper::getValue($oldUser,'wx_openid','');
        $wxconnect_unionid = ArrayHelper::getValue($oldUser,'wxconnect_unionid','');
        $wx_unionid = ArrayHelper::getValue($oldUser,'wx_unionid',$wxconnect_unionid);
        $customerWx->unionId = $wx_unionid;
        $customerWx->avatar_url = ArrayHelper::getValue($oldUser,'user_photo','');
        $customerWx->gender = ArrayHelper::getValue($oldUser,'user_sex',1);
        $customerWx->province = ArrayHelper::getValue($oldUser,'user_province',0);
        $customerWx->city = ArrayHelper::getValue($oldUser,'user_city',0);
        $customerWx->mobile = ArrayHelper::getValue($oldUser,'user_mobile',0);
        $customerWx->watermark = '';
        $customerWx->is_wx_subscribe = ArrayHelper::getValue($oldUser,'wx_subscribe',0);
        $customerWx->wx_subscribe_time = ArrayHelper::getValue($oldUser,'wx_subscribe_time',0);
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
          echo '客服创建成功'.$model->id;
        } else {
            var_dump($model->getErrors());
        }
    }
}