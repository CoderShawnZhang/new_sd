<?php
/**
 * Created by PhpStorm.
 * User: zhanghongbo
 * Date: 2020-08-05
 * Time: 12:13
 */
namespace Service\ServiceModules\ServiceCustomer\Models;

use Service\Ars\Tables\CustomerTable;

class CustomerModel extends CustomerTable
{
    public static function tableName()
    {
        return '{{%customer}}';
    }
}