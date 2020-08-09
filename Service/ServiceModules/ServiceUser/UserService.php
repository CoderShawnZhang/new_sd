<?php
/**
 * Created by PhpStorm.
 * User: zhanghongbo
 * Date: 2020-07-21
 * Time: 17:00
 */

namespace Service\ServiceModules\ServiceUser;

use Service\ServiceModules\ServiceUser\Models\UserLoginModel;
use Service\ServiceModules\ServiceUser\Modules\CustomerServiceModule;

/**
 * 对外调用服务层。
 * Class UserService
 * @package Service\ServiceModules\ServiceUser
 */
final class UserService
{
    /**
     * @param $loginData
     * @param $model
     * @return mixed
     */
   public static function checkLogin($loginData,$model){
       return UserFacadeService::Login($loginData,$model);
   }

   public static function getUserModel(){
       return new UserLoginModel();
   }

    /**
     * 获取客服列表
     */
   public static function getCustomerService()
   {
        return new CustomerServiceModule();
   }
}