<?php

namespace Service\Ars\Querys;

/**
 * This is the ActiveQuery class for [[\Service\Ars\Tables\AttributeTypeTable]].
 *
 * @see \Service\Ars\Tables\AttributeTypeTable
 */
class AttributeTypeQuery extends \yii\db\ActiveQuery
{
    /*public function active()
    {
        return $this->andWhere('[[status]]=1');
    }*/

    /**
     * {@inheritdoc}
     * @return \Service\Ars\Tables\AttributeTypeTable[]|array
     */
    public function all($db = null)
    {
        return parent::all($db);
    }

    /**
     * {@inheritdoc}
     * @return \Service\Ars\Tables\AttributeTypeTable|array|null
     */
    public function one($db = null)
    {
        return parent::one($db);
    }

    public function goodsAttr()
    {
        $this->andWhere(['type' => 1]);
        return $this;
    }
}
