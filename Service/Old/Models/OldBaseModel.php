<?php
/**
 * Created by PhpStorm.
 * User: zhanghongbo
 * Date: 2020-08-03
 * Time: 09:38
 */

namespace Service\Old\Models;


use yii\db\ActiveRecord;

class OldBaseModel extends ActiveRecord
{
    public static function getDb()
    {
        return \Yii::$app->old_sodeng;
    }
}