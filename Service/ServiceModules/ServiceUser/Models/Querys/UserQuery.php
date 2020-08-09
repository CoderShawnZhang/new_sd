<?php

namespace Service\ServiceModules\ServiceUser\Models\Querys;

use Service\ServiceBase\Constants\CustomerConstant;

/**
 * This is the ActiveQuery class for [[\Service\Ars\Tables\UserTable]].
 *
 * @see \Service\Ars\Tables\UserTable
 */
class UserQuery extends \Service\Ars\Querys\UserQuery
{
    public $tableName;

    /*public function active()
    {
        return $this->andWhere('[[status]]=1');
    }*/

    /**
     * {@inheritdoc}
     * @return \Service\Ars\Tables\UserTable[]|array
     */
    public function all($db = null)
    {
        return parent::all($db);
    }

    /**
     * {@inheritdoc}
     * @return \Service\Ars\Tables\UserTable|array|null
     */
    public function one($db = null)
    {
        return parent::one($db);
    }

    public function prepare($builder)
    {

        $this->andWhere([$this->tableName.".type" => CustomerConstant::USER_TYPE_SERVICE]);

        return parent::prepare($builder); // TODO: Change the autogenerated stub
    }
}