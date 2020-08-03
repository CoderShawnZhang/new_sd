<?php
/**
 * Created by PhpStorm.
 * User: zhanghongbo
 * Date: 2020-07-31
 * Time: 17:10
 */
namespace Service\ServiceModules\ServiceMenu\Models\Query;

use yii\db\ActiveQuery;

/**
 * Class MenuQuery
 * @package Service\ServiceModules\ServiceMenu\Querys
 * @see \Service\ServiceModules\ServiceMenu\Models\Ar\MenuAr
 */
final class MenuQuery extends ActiveQuery
{
    public $tableName;

    /**
     * @param $builder
     * @return ActiveQuery|\yii\db\Query
     */
    public function prepare($builder)
    {
//        $this->andWhere(['status'=>1]);
        return parent::prepare($builder);
    }

    /**
     * @return $this
     */
    public function topTag(){
        $this->andWhere(['like',$this->tableName.'.data','top']);
        return $this;
    }
}