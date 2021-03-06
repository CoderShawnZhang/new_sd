<?php
/**
 * Created by PhpStorm.
 * User: zhanghongbo
 * Date: 2020-07-24
 * Time: 15:16
 */
namespace Service\Helper\Models\Ar;

use Service\Ars\Tables\ConfigTable;

/**
 * Class ConfigAr
 * @package Service\ServiceHelper\Models\Ar
 * @property $key string
 * @property $value string
 * @property $desc string
 */
class ConfigAr extends ConfigTable
{
    public static function tableName()
    {
        return '{{%config}}';
    }
}