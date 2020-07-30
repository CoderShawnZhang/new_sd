<?php

namespace Service\Ars\Querys;

/**
 * This is the ActiveQuery class for [[\Service\Ars\Tables\ConfigTable]].
 *
 * @see \Service\Ars\Tables\ConfigTable
 */
class ConfigQuery extends \yii\db\ActiveQuery
{
    /*public function active()
    {
        return $this->andWhere('[[status]]=1');
    }*/

    /**
     * {@inheritdoc}
     * @return \Service\Ars\Tables\ConfigTable[]|array
     */
    public function all($db = null)
    {
        return parent::all($db);
    }

    /**
     * {@inheritdoc}
     * @return \Service\Ars\Tables\ConfigTable|array|null
     */
    public function one($db = null)
    {
        return parent::one($db);
    }

    public function topMenu()
    {
        $this->andFilterWhere(['like','data','top']);
        return $this;
    }
}
