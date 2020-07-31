<?php
/**
 * Created by PhpStorm.
 * User: zhanghongbo
 * Date: 2020-07-30
 * Time: 10:12
 */

namespace Service\ServiceHelper\Models\Search;


use Service\ServiceBase\SearchModel;
use Service\ServiceHelper\Models\Ar\ConfigAr;

/**
 * Class Config1SearchModel
 * @package Service\ServiceHelper\Models\Search
 * @property integer key
 */
class Config1SearchModel extends SearchModel
{
    public $key;

    public function __construct(array $config = [])
    {
        parent::__construct($config);
    }

    function rules()
    {
        return [
            [['key'], 'string'],
        ];
    }
    public function setCondition()
    {
        $this->query = ConfigAr::find();
        $this->query->andFilterWhere(['key' => $this->key]);
//        if(!empty($this->key)){
//            $this->query->topMenu();
//        }
        return $this;
    }
}