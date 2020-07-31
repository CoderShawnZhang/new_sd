<?php
/**
 * Created by PhpStorm.
 * User: zhanghongbo
 * Date: 2020-07-21
 * Time: 16:41
 * 对外调用接口采用 "门面模式"
 */
namespace Service\ServiceModules\ServiceUser;

use Service\ServiceBase\Service;
use Service\ServiceModules\ServiceUser\Models\UserLoginModel;

/**
 * 分发多个子系统功能
 * Class FacadeService
 * @package Service\ServiceModules\ServiceUser
 */
final class UserFacadeService extends Service
{
    /**
     * @param $loginData
     * @param $model UserLoginModel
     * @return mixed
     */
   public static function Login($loginData,$model)
   {
      return $model->checkLoginData($loginData,$model);
   }
}