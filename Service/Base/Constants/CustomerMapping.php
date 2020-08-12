<?php
/**
 * Created by PhpStorm.
 * User: zhanghongbo
 * Date: 2020-08-03
 * Time: 10:17
 */

namespace Service\Base\Constants;


class CustomerMapping
{

    /**
     * 获取系统所有角色列表
     * @return array
     */
    public static function getCustomerRoleList()
    {
        return [
            CustomerConstant::USER_ROLE_IS_AGENT=>CustomerConstant::USER_ROLE_TXT_AGENT,
            CustomerConstant::USER_ROLE_IS_ALLIANCE=>CustomerConstant::USER_ROLE_TXT_ALLIANCE,
            CustomerConstant::USER_ROLE_IS_PARTNER => CustomerConstant::USER_ROLE_TXT_PARTNER,
            CustomerConstant::USER_ROLE_IS_ENTITY => CustomerConstant::USER_ROLE_TXT_ENTITY,
            CustomerConstant::USER_ROLE_IS_PARTNER_CUSTOMER => CustomerConstant::USER_ROLE_TXT_PARTNER_CUSTOMER,
            CustomerConstant::USER_ROLE_IS_NONE => CustomerConstant::USER_ROLE_TXT_NONE,
            CustomerConstant::USER_ROLE_IS_OTHER => CustomerConstant::USER_ROLE_TXT_OTHER,
            0 => '无'
        ];
    }
    /**
     * 获取客户角色
     * @param $roleId
     * @return mixed|string
     */
    public static function getUserRoleName($roleId)
    {
        $roleArray = self::getCustomerRoleList();
        return isset($roleArray[$roleId]) ? $roleArray[$roleId] : '';
    }
}