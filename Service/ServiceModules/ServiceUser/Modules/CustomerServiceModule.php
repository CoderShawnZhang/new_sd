<?php
/**
 * Created by PhpStorm.
 * User: zhanghongbo
 * Date: 2020-08-09
 * Time: 09:28
 */
namespace Service\ServiceModules\ServiceUser\Modules;

use Service\ServiceModules\ServiceUser\Models\CustomerServiceModel;

/**
 * 客服模块
 * Class CustomerServiceModule
 * @package Service\ServiceModules\ServiceUser
 */
class CustomerServiceModule
{
    /**
     * @var CustomerServiceModel
     */
    private $model;

    public function __construct()
    {
        $this->model =  new CustomerServiceModel();
    }

    /**
     * 获取客服列表
     * @return array|\Service\Ars\Tables\UserTable[]|Models\UserModel[]
     */
    public function getList()
    {
        return $this->model->list();
    }

    public function getCount()
    {
        return $this->model->count();
    }
}