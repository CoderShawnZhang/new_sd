<?php
/**
 * Created by PhpStorm.
 * User: zhanghongbo
 * Date: 2020-08-05
 * Time: 18:14
 */

namespace Service\ServiceHelper;


use Service\ServiceBase\Constants\CustomerConstant;

class UserService
{
    /**
     * 获取角色样式
     *
     * @param $roleId
     * @return mixed|string
     */
    public static function getRoleStyle($roleId){
        $roleStyleArray = [
            CustomerConstant::USER_ROLE_IS_AGENT => 'layui-badge',
            CustomerConstant::USER_ROLE_IS_ALLIANCE => 'layui-badge layui-bg-orange',
            CustomerConstant::USER_ROLE_IS_PARTNER => 'layui-badge layui-bg-green',
            CustomerConstant::USER_ROLE_IS_ENTITY => 'layui-badge layui-bg-cyan',
            CustomerConstant::USER_ROLE_IS_PARTNER_CUSTOMER => 'layui-badge layui-bg-blue',
            CustomerConstant::USER_ROLE_IS_NONE => 'layui-badge layui-bg-nobind',
            CustomerConstant::USER_ROLE_IS_OTHER => 'layui-badge layui-bg-gray'
        ];
        return isset($roleStyleArray[$roleId]) ? $roleStyleArray[$roleId] : '';
    }
}