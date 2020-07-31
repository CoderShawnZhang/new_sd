<?php
/**
 * Created by PhpStorm.
 * User: zhanghongbo
 * Date: 2020-07-31
 * Time: 10:15
 */

namespace Service\ServiceHelper\Modules;


use Service\ServiceHelper\Models\Search\Config1SearchModel;

class StrategyFind
{
    /**
     * @var StrategyAbstract
     */
    public $strategy_model;

    public function __construct($model)
    {
        $this->strategy_model = $model;
    }

    /**
     * 运行载入模块
     * @return Config1SearchModel
     */
    public function run()
    {
        $model = $this->strategy_model->runModule();

        return $model;
    }

    /**
     * 策略变异
     */
    public function variation(){
        return '介入其他算法,需要可以依赖注入$this->strategy_model';
    }

}