<?php
/**
 * Created by PhpStorm.
 * User: zhanghongbo
 * Date: 2020-08-03
 * Time: 10:17
 */

namespace Service\ServiceBase\Constants;


class UserMapping
{
    public static function getUserRoleName()
    {
        return [
            UserConstant::USER_ROLE_IS_AGENT=>UserConstant::USER_ROLE_TXT_AGENT,
            UserConstant::USER_ROLE_IS_ALLIANCE=>UserConstant::USER_ROLE_TXT_ALLIANCE,
            UserConstant::USER_ROLE_IS_PARTNER => UserConstant::USER_ROLE_TXT_PARTNER,
            UserConstant::USER_ROLE_IS_ENTITY => UserConstant::USER_ROLE_TXT_ENTITY,
            UserConstant::USER_ROLE_IS_PARTNER_CUSTOMER => UserConstant::USER_ROLE_TXT_PARTNER_CUSTOMER,
            UserConstant::USER_ROLE_IS_NONE => UserConstant::USER_ROLE_TXT_NONE,
            UserConstant::USER_ROLE_IS_OTHER => UserConstant::USER_ROLE_TXT_OTHER,
            0 => '无'
        ];
    }
}