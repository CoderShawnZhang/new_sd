<?php
/**
 * Created by PhpStorm.
 * User: zhanghongbo
 * Date: 2020-07-30
 * Time: 09:57
 */
namespace Service\Helper\Modules;

use Service\Helper\Models\Search\ConfigSearchModel;

/**
 *
 * Class HelperModule
 * @package Service\ServiceHelper\Modules
 */
class HelperModule extends StrategyAbstract
{
    public function runModule()
    {
        $model = new ConfigSearchModel();
        return $model;
    }
}