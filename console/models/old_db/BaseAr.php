<?php
/**
 * Created by PhpStorm.
 * User: zhanghongbo
 * Date: 2020-07-16
 * Time: 15:54
 */
namespace console\models\old_db;

use yii\base\Model;
use yii\db\ActiveRecord;

class BaseAr extends ActiveRecord
{
    public static function getDb()
    {
        return \Yii::$app->old_sodeng;
    }
}