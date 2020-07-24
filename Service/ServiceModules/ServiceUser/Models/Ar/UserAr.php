<?php
/**
 * Created by PhpStorm.
 * User: zhanghongbo
 * Date: 2020-07-21
 * Time: 17:11
 */
namespace Service\ServiceModules\ServiceUser\Models\Ar;

use yii\db\ActiveRecord;

/**
 * Class UserAr
 * @package Service\ServiceModules\ServiceUser\Models\Ar
 * @property integer username
 */
class UserAr extends ActiveRecord
{
    public static function tableName()
    {
        return '{{%user}}';
    }

    public function rules()
    {
        return [
          [['username','password'],'string']
        ];
    }
}