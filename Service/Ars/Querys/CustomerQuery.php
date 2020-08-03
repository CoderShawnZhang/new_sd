<?php

namespace Service\Ars\Querys;

/**
 * This is the ActiveQuery class for [[\Service\Ars\Tables\CustomerTable]].
 *
 * @see \Service\Ars\Tables\CustomerTable
 */
class CustomerQuery extends \yii\db\ActiveQuery
{
    /*public function active()
    {
        return $this->andWhere('[[status]]=1');
    }*/

    /**
     * {@inheritdoc}
     * @return \Service\Ars\Tables\CustomerTable[]|array
     */
    public function all($db = null)
    {
        return parent::all($db);
    }

    /**
     * {@inheritdoc}
     * @return \Service\Ars\Tables\CustomerTable|array|null
     */
    public function one($db = null)
    {
        return parent::one($db);
    }
}
