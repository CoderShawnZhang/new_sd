<?php
/**
 * Created by PhpStorm.
 * User: zhanghongbo
 * Date: 2020-08-05
 * Time: 12:13
 */
namespace Service\Modules\Customer;

use Service\Base\Service;
use Service\Modules\Customer\Models\CustomerModel;
use Service\Modules\Customer\Traits\TransOldDb;

class CustomerService extends Service
{
    use TransOldDb;

    /**
     *
     */
    public static function search()
    {
        //策略模式选择哪个模型查询
        $model = new CustomerModel();
        return $model->search();
    }
}