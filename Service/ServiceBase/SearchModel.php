<?php
/**
 *
 */

namespace Service\ServiceBase;


use Service\ServiceBase\Interfaces\SearchModelInterface;
use yii\base\Model;
use yii\db\ActiveQuery;

abstract class SearchModel extends Model implements SearchModelInterface
{
    /**
     * @var ActiveQuery
     */
    protected $query;


    protected $_fields;

    /**
     * @param string $fields
     */
    public function setFields(string $fields = '*')
    {
        $this->_fields = $fields;
    }

    public function getFields()
    {
        return $this->_fields;
    }

    public function getOne()
    {
        $this->query->createCommand()->getRawSql();
        return $this->query->one();
    }

    public function getAll()
    {
        return $this->query->all();
    }

    public function search()
    {
        $this->setCondition();
        $this->query->select($this->getFields());
        return $this;
    }
}