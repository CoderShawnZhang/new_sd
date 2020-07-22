<?php
/**
 * Created by PhpStorm.
 * User: zhanghongbo
 * Date: 2020-07-16
 * Time: 15:58
 */

namespace console\models\old_db;


use yii\db\ActiveQuery;
use yii\db\ActiveRecord;

/**
 * Class TestQuery
 * @package console\models\old_db
 * @see Test
 */
class TestQuery extends ActiveQuery
{
    public $tableName;

    /**
     * @param array $params
     * @return TestQuery
     */
    public function self($params = [])
    {
        return $this->andWhere([$this->tableName.'.user_id' => 700000]);
    }

    /**
     * @param array $params
     * @return TestQuery
     */
    public function b($params = [])
    {
        return $this->andWhere([$this->tableName.'.user_id' => 1]);
    }

    /**
     * @param array $params
     * @return TestQuery
     */
    public function c($params = [])
    {
        return $this->andWhere([$this->tableName.'.user_id' => 1]);
    }

    /**
     * @param array $params
     * @return TestQuery
     */
    public function d($params = [])
    {
        return $this->andWhere([$this->tableName.'.user_id' => 1]);
    }
}