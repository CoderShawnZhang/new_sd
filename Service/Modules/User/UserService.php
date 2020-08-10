<?php
/**
 * Created by PhpStorm.
 * User: zhanghongbo
 * Date: 2020-07-21
 * Time: 17:00
 */

namespace Service\Modules\User;

use Service\Base\Service;
use Service\Modules\User\Models\UserLoginModel;
use Service\Modules\User\Models\UserModel;
use Service\Modules\User\Modules\CustomerModule;
use Service\Modules\User\Modules\Search\UserSearch;

/**
 * 对外调用服务层。
 * Class UserService
 * @package Service\Modules\User
 */
final class UserService extends Service
{
    /**
     * @param $loginData
     * @param $model
     * @return mixed
     */
   public static function checkLogin($loginData,$model){
       return $model->checkLoginData($loginData,$model);
   }

    /**
     * @return UserLoginModel
     */
   public static function getUserModel(){
       return new UserLoginModel();
   }

    /**
     * 获取客服列表
     */
   public static function getCustomerService()
   {
        return new CustomerModule();
   }

    /**
     * 客户查询模型
     *
     * @return mixed|Models\Search\UserSearch
     */
   public static function getSearchClass()
   {
        $model = new UserModel();
        return $model->getSearchModel();
   }

}