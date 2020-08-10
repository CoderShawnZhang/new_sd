<?php
/**
 * Created by PhpStorm.
 * User: zhanghongbo
 * Date: 2020-07-30
 * Time: 09:10
 */
namespace Service\Helper\Models\Search;

use Service\Base\SearchModel;
use Service\Helper\Models\Ar\ConfigAr;

class ConfigSearchModel extends SearchModel
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
        if(!empty($this->data)){
            $this->query->topMenu();
        }

        return $this;
    }
}