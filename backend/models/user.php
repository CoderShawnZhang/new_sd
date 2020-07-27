<?php
/**
 * Created by PhpStorm.
 * User: zhanghongbo
 * Date: 2020-07-18
 * Time: 09:39
 */
namespace backend\models;

use yii\db\ActiveRecord;

class user extends ActiveRecord{
    public static function tableName()
    {
        return '{{user}}';
    }
}