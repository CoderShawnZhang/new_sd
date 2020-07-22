<?php
/**
 * Created by PhpStorm.
 * User: zhanghongbo
 * Date: 2020-07-16
 * Time: 15:51
 */
namespace console\models\old_db;
use yii\base\Model;
use yii\db\ActiveRecord;

/**
 * Class Test
 * @package console\models\old_db
 * @property string store_name
 * @property string user_name
 */
class Test extends BaseAr
{
    public static function tableName()
    {
        return '{{%user}}';
    }

    public function fields()
    {
        return [
            'user_id',
            'store_name' => function(self $m){
                return $m->store_name . $m->user_name;
            }
        ];
    }

    public static function find()
    {
        return new TestQuery(get_called_class(),['tableName'=>self::tableName()]);
    }
}