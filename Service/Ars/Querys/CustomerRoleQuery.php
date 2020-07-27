<?php

namespace Service\Ars\Querys;

/**
 * This is the ActiveQuery class for [[\Service\Ars\Tables\CustomerRoleTable]].
 *
 * @see \Service\Ars\Tables\CustomerRoleTable
 */
class CustomerRoleQuery extends \yii\db\ActiveQuery
{
    /*public function active()
    {
        return $this->andWhere('[[status]]=1');
    }*/

    /**
     * {@inheritdoc}
     * @return \Service\Ars\Tables\CustomerRoleTable[]|array
     */
    public function all($db = null)
    {
        return parent::all($db);
    }

    /**
     * {@inheritdoc}
     * @return \Service\Ars\Tables\CustomerRoleTable|array|null
     */
    public function one($db = null)
    {
        return parent::one($db);
    }
}
