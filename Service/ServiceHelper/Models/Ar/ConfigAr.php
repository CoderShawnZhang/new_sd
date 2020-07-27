<?php
/**
 * Created by PhpStorm.
 * User: zhanghongbo
 * Date: 2020-07-24
 * Time: 15:16
 */
namespace Service\ServiceHelper\Models\Ar;

use yii\db\ActiveRecord;

/**
 * Class ConfigAr
 * @package Service\ServiceHelper\Models\Ar
 * @property $key string
 * @property $value string
 * @property $desc string
 */
class ConfigAr extends ActiveRecord
{
    public static function tableName()
    {
        return '{{%config}}';
    }
}