<?php
/**
 * Created by PhpStorm.
 * User: zhanghongbo
 * Date: 2020-07-21
 * Time: 16:41
 * 对外调用接口采用 "门面模式"
 */
namespace Service\ServiceModules\ServiceUser;

use Service\ServiceBase\BaseService;

/**
 * 分发多个子系统功能
 * Class FacadeService
 * @package Service\ServiceModules\ServiceUser
 */
final class UserFacadeService extends BaseService
{
    //客户管理
    //客户角色
    //客户代理商
    //客户加盟商
    //客户返现计算
    //客户任务
    public  function a()
    {

    }

    public function b()
    {
        UserFacadeService::a();
    }
}