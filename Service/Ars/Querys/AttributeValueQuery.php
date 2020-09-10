<?php

namespace Service\Ars\Querys;

/**
 * This is the ActiveQuery class for [[\Service\Ars\Tables\AttributeValueTable]].
 *
 * @see \Service\Ars\Tables\AttributeValueTable
 */
class AttributeValueQuery extends \yii\db\ActiveQuery
{
    /*public function active()
    {
        return $this->andWhere('[[status]]=1');
    }*/

    /**
     * {@inheritdoc}
     * @return \Service\Ars\Tables\AttributeValueTable[]|array
     */
    public function all($db = null)
    {
        return parent::all($db);
    }

    /**
     * {@inheritdoc}
     * @return \Service\Ars\Tables\AttributeValueTable|array|null
     */
    public function one($db = null)
    {
        return parent::one($db);
    }
}
