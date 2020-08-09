<?php
/**
 * Created by PhpStorm.
 * User: zhanghongbo
 * Date: 2020-08-03
 * Time: 09:51
 */
namespace Service\ServiceBase\Constants;

class CustomerConstant
{
    const USER_ROLE_IS_AGENT = 1;
    const USER_ROLE_IS_ALLIANCE = 2;
    const USER_ROLE_IS_PARTNER = 3;
    const USER_ROLE_IS_ENTITY = 4;
    const USER_ROLE_IS_PARTNER_CUSTOMER = 5;
    const USER_ROLE_IS_NONE = 6;
    const USER_ROLE_IS_OTHER = 7;

    //客户角色
    const USER_ROLE_TXT_AGENT = '代理商';
    const USER_ROLE_TXT_ALLIANCE = '加盟商';
    const USER_ROLE_TXT_PARTNER = '合伙人';
    const USER_ROLE_TXT_ENTITY = '实体店';
    const USER_ROLE_TXT_PARTNER_CUSTOMER = '合伙人客户';
    const USER_ROLE_TXT_NONE = '未绑定';
    const USER_ROLE_TXT_OTHER = '未知';


    //用户角色
    const USER_TYPE_BACKEND = 0;//后端人员
    const USER_TYPE_SERVICE = 1;//客服
}