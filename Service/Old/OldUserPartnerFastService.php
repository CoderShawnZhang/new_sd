<?php
/**
 * Created by PhpStorm.
 * User: zhanghongbo
 * Date: 2020-08-03
 * Time: 11:14
 */

namespace Service\Old;


use Service\Base\Constants\CustomerMapping;

/**
 * Class OldUserPartnerFastService
 * @package Service\Old
 */
class OldUserPartnerFastService
{
    /**
     * @param $cur_user_id
     * @return array
     */
    public static function getPartnerFastRole($cur_user_id)
    {
        list($role_id,$partner_fast) = OldUserService::getUserRole($cur_user_id);
        $roleName = CustomerMapping::getUserRoleName($role_id);
        return [$role_id,$partner_fast,$cur_user_id.'角色：'.$roleName];
    }
}