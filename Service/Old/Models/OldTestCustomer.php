<?php
/**
 * Created by PhpStorm.
 * User: zhanghongbo
 * Date: 2020-08-03
 * Time: 16:17
 */

namespace Service\Old\Models;


use yii\db\ActiveRecord;

class OldTestCustomer extends ActiveRecord
{
    public static function tableName()
    {
        return '{{%user1}}';
    }
}