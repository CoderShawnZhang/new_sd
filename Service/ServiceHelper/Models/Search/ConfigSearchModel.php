<?php
/**
 * Created by PhpStorm.
 * User: zhanghongbo
 * Date: 2020-07-30
 * Time: 09:10
 */
namespace Service\ServiceHelper\Models\Search;

use Service\ServiceBase\SearchModel;
use Service\ServiceHelper\Models\Ar\ConfigAr;

class ConfigSearchModel extends SearchModel
{
    public $data;

    public function __construct(array $config = [])
    {
        parent::__construct($config);
    }

    function rules()
    {
        return [
            [['data'], 'string'],
        ];
    }
    public function setCondition()
    {
        $this->query = ConfigAr::find();
        if(!empty($this->data)){
            $this->query->topMenu();
        }

        return $this;
    }
}