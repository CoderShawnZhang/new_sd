<?php

namespace Service\Ars\Querys;

/**
 * This is the ActiveQuery class for [[\Service\Ars\Tables\CateTable]].
 *
 * @see \Service\Ars\Tables\CateTable
 */
class CateQuery extends \yii\db\ActiveQuery
{
    /*public function active()
    {
        return $this->andWhere('[[status]]=1');
    }*/

    /**
     * {@inheritdoc}
     * @return \Service\Ars\Tables\CateTable[]|array
     */
    public function all($db = null)
    {
        return parent::all($db);
    }

    /**
     * {@inheritdoc}
     * @return \Service\Ars\Tables\CateTable|array|null
     */
    public function one($db = null)
    {
        return parent::one($db);
    }
}
