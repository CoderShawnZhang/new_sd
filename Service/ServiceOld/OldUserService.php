<?php
/**
 * Created by PhpStorm.
 * User: zhanghongbo
 * Date: 2020-08-03
 * Time: 09:49
 */
namespace Service\ServiceOld;

use common\models\User;
use Service\ServiceBase\Constants\UserConstant;
use Service\ServiceOld\Models\OldCustomer;

class OldUserService
{
    /**
     * 获取旧表用户角色
     *
     * @param $user_id
     * @return array
     */
    public static function getUserRole($user_id)
    {
        if($user_id == 0){
            return [0,0];
        }
        $role_id = self::checkUserRoleById($user_id);
        $partner_fast = self::getUserPartnerFast($user_id,$role_id);
        return [$role_id,$partner_fast];
    }

    /**
     *
     * 通过用户id检查用户角色
     *
     * @param $user_id
     * @return int
     */
    private static function checkUserRoleById($user_id)
    {
        $userInfo = OldCustomer::find()->where(['user_id' => $user_id])->one();
        //代理商
        //user_rank_id=30
        //user_status=6
        //代理商条件1  $userInfo['user_grade'] == 80 ，$is_agent=M('User')->where("agent_ids=".$v["user_id"])->find(); user_authentication=1

        $is_agent = OldCustomer::find()->where(['agent_ids' => $user_id])->one();
        if($userInfo['user_grade'] == 80 && $userInfo['user_authentication'] == 1 && !empty($is_agent)){
            return UserConstant::USER_ROLE_IS_AGENT;
        }
        //代理商条件2
        if($userInfo['user_rank_id'] == 30 && ($userInfo['user_grade'] == 1 || $userInfo['user_grade'] == 2)){
            return UserConstant::USER_ROLE_IS_AGENT;
        }
        //加盟商
        if($userInfo['user_grade'] == 80 && $userInfo['user_authentication'] == 1 && empty($is_agent)){
            return UserConstant::USER_ROLE_IS_ALLIANCE;
        }
        //合伙人
        if($userInfo['is_partners'] == 1){
            return UserConstant::USER_ROLE_IS_PARTNER;
        }
        //普通拿货（上级一定是代理）
        if($userInfo['user_authentication'] == 1 && $userInfo['user_grade'] != 80){
            return UserConstant::USER_ROLE_IS_ENTITY;
        }
        //合伙人客户（一定不是认证的）
        if($userInfo['is_partners'] == 0 && $userInfo['user_authentication'] == 0 && $userInfo['partnersid'] >0 && $userInfo['alliance_id'] > 0){
            return UserConstant::USER_ROLE_IS_PARTNER_CUSTOMER;
        }
        //未绑定
        if($userInfo['user_authentication'] == 0 && $userInfo['is_partners'] == 0 && $userInfo['partners_id'] ==0 && $userInfo['alliance_id'] == 0){
            return UserConstant::USER_ROLE_IS_NONE;
        }
        return UserConstant::USER_ROLE_IS_OTHER;
    }

    private static function getUserPartnerFast($user_id,$role_id)
    {
        //代理
        if($role_id == UserConstant::USER_ROLE_IS_AGENT){
            return 0;
        }
        //加盟
        if($role_id == UserConstant::USER_ROLE_IS_ALLIANCE){
            $userInfo = OldCustomer::find()->where(['user_id' => $user_id])->one();
            if($userInfo['agent_id'] > 0){
                return $userInfo['agent_id'];
            }
        }
        //合伙人
        if($role_id == UserConstant::USER_ROLE_IS_PARTNER){
            $userInfo = OldCustomer::find()->where(['user_id' => $user_id])->one();
            if($userInfo['partners_id'] > 0){
                return $userInfo['partners_id'];
            }
        }
        //实体认证（上级一定是代理）
        if($role_id == UserConstant::USER_ROLE_IS_ENTITY){
            $userInfo = OldCustomer::find()->where(['user_id' => $user_id])->one();
            if($userInfo['agent_id'] > 0){
                return $userInfo['agent_id'];
            }
        }
        //合伙人客户
        if($role_id == UserConstant::USER_ROLE_IS_PARTNER_CUSTOMER){
            $userInfo = OldCustomer::find()->where(['user_id' => $user_id])->one();
            if($userInfo['partnersid'] > 0){
                return $userInfo['partnersid'];
            }
        }
        return 0;
    }

    public static function getCustomerData()
    {

    }

    public static function getCustomerCommonData()
    {

    }

    public static function getCustomerRoleData()
    {

    }

    public static function getCustomerWxData()
    {

    }
}