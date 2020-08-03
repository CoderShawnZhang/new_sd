<?php
/**
 * Created by PhpStorm.
 * User: zhanghongbo
 * Date: 2020-07-31
 * Time: 14:31
 */
namespace Service\ServiceModules\ServiceMenu\Models\Ar;

use Service\Ars\Tables\MenuTable;
use Service\ServiceModules\ServiceMenu\Models\Query\MenuQuery;

/**
 * Class MenuAr
 * @package Service\ServiceModules\ServiceMenu\Models\Ar
 */
class MenuAr extends MenuTable
{

    public static function find()
    {
        return new MenuQuery(get_called_class(),['tableName' => static::tableName()]);
    }


}