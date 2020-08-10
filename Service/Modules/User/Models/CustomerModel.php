<?php
/**
 * Created by PhpStorm.
 * User: zhanghongbo
 * Date: 2020-08-09
 * Time: 09:34
 */

namespace Service\Modules\User\Models;
use Service\Modules\User\Models\Querys\UserQuery;

/**
 * Class CustomerModel
 * @package Service\Modules\User\Models
 */
class CustomerModel extends UserModel
{
    /**
     * @return \Service\Ars\Querys\UserQuery|UserQuery
     */
    public static function find()
    {
        return new UserQuery(get_called_class(),['tableName' => self::tableName()]);
    }

    /**
     * @return array|\Service\Ars\Tables\UserTable[]|UserModel[]
     */
    public function getList()
    {
        return self::find()->all();
    }

    public function getCount()
    {
        return self::find()->count();
    }
}