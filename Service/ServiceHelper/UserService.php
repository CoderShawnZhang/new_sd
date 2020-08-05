<?php
/**
 * Created by PhpStorm.
 * User: zhanghongbo
 * Date: 2020-08-05
 * Time: 18:14
 */

namespace Service\ServiceHelper;


use Service\ServiceBase\Constants\UserConstant;

class UserService
{
    /**
     * 获取角色样式
     */
    public static function getRoleStyle(){
        return [
            UserConstant::USER_ROLE_IS_AGENT => 'layui-badge',
            UserConstant::USER_ROLE_IS_ALLIANCE => 'layui-badge layui-bg-orange',
            UserConstant::USER_ROLE_IS_PARTNER => 'layui-badge layui-bg-green',
            UserConstant::USER_ROLE_IS_ENTITY => 'layui-badge layui-bg-cyan',
            UserConstant::USER_ROLE_IS_PARTNER_CUSTOMER => 'layui-badge layui-bg-blue',
            UserConstant::USER_ROLE_IS_NONE => 'layui-badge layui-bg-nobind',
            UserConstant::USER_ROLE_IS_OTHER => 'layui-badge layui-bg-gray'
        ];
    }
}