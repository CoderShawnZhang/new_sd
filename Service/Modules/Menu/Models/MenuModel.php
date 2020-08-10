<?php
/**
 * Created by PhpStorm.
 * User: zhanghongbo
 * Date: 2020-07-31
 * Time: 14:32
 */
namespace Service\Modules\Menu\Models;

use Service\Ars\Tables\MenuTable;
use Service\Modules\Menu\Models\Querys\MenuQuery;

/**
 * Class MenuModel
 * @package Service\Modules\Menu\Models
 */
class MenuModel extends MenuTable
{
    /**
     * 自定义查询器
     *
     * @return \Service\Ars\Querys\ConfigQuery|MenuQuery
     */
    public static function find()
    {
        return new MenuQuery(get_called_class(),['tableName' => self::tableName()]);
    }

    /**
     * 过滤顶部菜单
     * @return array
     */
    public function getTopMenu()
    {
        return self::find()->isTopMenu()->orderBy('order asc')->all();
    }

}