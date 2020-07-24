<?php
/**
 * Created by PhpStorm.
 * User: zhanghongbo
 * Date: 2020-07-21
 * Time: 17:00
 */

namespace Service\ServiceModules\ServiceUser;

use Service\ServiceModules\ServiceUser\Models\Ar\UserAr;

/**
 * 对外调用服务层。
 * Class UserService
 * @package Service\ServiceModules\ServiceUser
 */
final class UserService
{
    public static function abc()
    {
        //TODO 根据业务子系统封装，可以再进行拆分门面服务
        //TODO 根据业务网关切换子系统提供的服务。
        return new UserFacadeService();
    }

    /**
     * 顶层调用；
     */
    public static function test()
    {
      return UserAr::find()->where(['username' => 'test'])->one();
    }
}