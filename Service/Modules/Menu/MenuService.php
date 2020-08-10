<?php
/**
 * Created by PhpStorm.
 * User: zhanghongbo
 * Date: 2020-08-10
 * Time: 15:11
 */
namespace Service\Modules\Menu;

use Service\Base\Service;
use Service\Modules\Menu\Models\MenuModel;

class MenuService extends Service
{


    public static function getTopMenuList()
    {
        $model = new MenuModel();
        return $model->getTopMenu();
    }
}