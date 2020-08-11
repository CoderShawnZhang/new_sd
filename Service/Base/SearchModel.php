<?php
/**
 *
 */

namespace Service\Base;


use Service\Base\Interfaces\SearchModelInterface;
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
    public function setFields($fields = '*')
    {
        $this->_fields = $fields;
    }

    public function getFields()
    {
        return $this->_fields;
    }

    public function getOne()
    {
        return $this->query->one();
    }

    public function getAll()
    {
        return $this->query->all();
    }

    public function getCount()
    {
        return $this->query->count();
    }

    public function search()
    {
        $this->setCondition();
        $this->query;
        return $this;
    }
}