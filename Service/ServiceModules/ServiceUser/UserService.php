<?php
/**
 * Created by PhpStorm.
 * User: zhanghongbo
 * Date: 2020-07-21
 * Time: 17:00
 */

namespace Service\ServiceModules\ServiceUser;

use Service\ServiceModules\ServiceUser\Models\Ar\UserAr;
use Service\ServiceModules\ServiceUser\Models\UserBaseModel;
use Service\ServiceModules\ServiceUser\Models\UserLoginModel;

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
}