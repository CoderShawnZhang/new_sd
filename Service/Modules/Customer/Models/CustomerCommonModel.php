<?php
/**
 * Created by PhpStorm.
 * User: zhanghongbo
 * Date: 2020-08-06
 * Time: 09:28
 */

namespace Service\Modules\Customer\Models;


use Service\Ars\Tables\CustomerCommonTable;

class CustomerCommonModel extends CustomerCommonTable
{
    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCustomerService()
    {
        return $this->hasOne(CustomerModel::className(),['c_id'=>'service_id']);
    }
}