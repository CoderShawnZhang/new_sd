<?php
/**
 * Created by PhpStorm.
 * User: zhanghongbo
 * Date: 2020-08-10
 * Time: 15:14
 */
namespace Service\Modules\Menu\Models\Querys;

class MenuQuery extends \Service\Ars\Querys\MenuQuery
{
    public $tableName;

    /**
     * 顶部菜单标示
     *
     * @return $this
     */
    public function isTopMenu()
    {
        $this->andWhere(['like',$this->tableName . '.data','top']);
        return $this;
    }
}