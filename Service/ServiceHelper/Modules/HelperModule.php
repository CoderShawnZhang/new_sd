<?php
/**
 * Created by PhpStorm.
 * User: zhanghongbo
 * Date: 2020-07-30
 * Time: 09:57
 */
namespace Service\ServiceHelper\Modules;

use Service\ServiceHelper\Models\Search\ConfigSearchModel;
use Service\ServiceHelper\Modules\SearchModule\ConfigSearch;
use Service\ServiceHelper\Modules\SearchModule\ConfigSearch1;

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