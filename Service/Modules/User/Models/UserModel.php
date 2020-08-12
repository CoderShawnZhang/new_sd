<?php
/**
 * Created by PhpStorm.
 * User: zhanghongbo
 * Date: 2020-08-09
 * Time: 09:29
 */

namespace Service\Modules\User\Models;

use Service\Ars\Tables\UserTable;
use Service\Modules\User\Models\Querys\UserQuery;
use Service\Modules\User\Models\Search\UserSearch;

/**
 * Class UserModel
 * @package Service\Modules\User\Models
 */
class UserModel extends UserTable
{

    /**
     * @return \Service\Ars\Querys\UserQuery|UserQuery
     */
    public static function find()
    {
        return new UserQuery(get_called_class(),['tableName' => self::tableName()]);
    }

    /**
     * 获取【用户】查询模型
     * @return UserSearch
     */
    public function getSearchModel()
   {
       return new UserSearch();
   }
}