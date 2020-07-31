<?php
/**
 * Created by PhpStorm.
 * User: zhanghongbo
 * Date: 2020-07-31
 * Time: 14:29
 */
namespace Service\ServiceModules\ServiceMenu;

use Service\ServiceModules\ServiceMenu\Models\MenuModel;

/**
 * Class ServiceMenu
 * @package Service\ServiceModules\ServiceMenu
 */
class ServiceMenu
{
    /**
     * @return array|\console\models\MenuAr[]|\Service\Ars\Tables\ConfigTable[]|Models\Ar\MenuAr[]|MenuModel[]|\yii\db\ActiveRecord[]
     */
    public static function getTopMenuList()
    {
       $model = new MenuModel();
       return $model->getTopMenu();
    }

}