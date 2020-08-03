<?php
/**
 * Created by PhpStorm.
 * User: zhanghongbo
 * Date: 2020-08-03
 * Time: 11:14
 */

namespace Service\ServiceOld;


use Service\ServiceBase\Constants\UserMapping;

class OldUserPartnerFastService
{
    public static function getPartnerFastRole($cur_user_id)
    {
        list($role_id,$partner_fast) = OldUserService::getUserRole($cur_user_id);
        $roleMap = UserMapping::getUserRoleName();
        return [$role_id,$partner_fast,$cur_user_id.'角色：'.$roleMap[$role_id]];
    }
}