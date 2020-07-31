<?php
/**
 * Created by PhpStorm.
 * User: zhanghongbo
 * Date: 2020-07-31
 * Time: 10:14
 */

namespace Service\ServiceHelper\Modules;


use Service\ServiceHelper\Models\Search\Config1SearchModel;

class Helper1Module extends StrategyAbstract
{
    /**
     * @param $condition
     * @return Config1SearchModel
     */
    public function runModule()
    {
       $model = new Config1SearchModel();

       return $model;
    }
}