<?php
/**
 * Created by PhpStorm.
 * User: zhanghongbo
 * Date: 2020-07-30
 * Time: 09:57
 */
namespace Service\ServiceHelper\Modules;

use Service\ServiceHelper\Modules\SearchModule\ConfigSearch;
use Service\ServiceHelper\Modules\SearchModule\ConfigSearch1;

/**
 * 工具服务层模块
 * Class HelperModule
 * @package Service\ServiceHelper\Modules
 */
class HelperModule
{
    /**
     * @return ConfigSearch
     */
    public function getConfigSearch()
    {
        return new ConfigSearch();
    }

    /**
     * @return ConfigSearch1
     */
    public function getConfigSearch1()
    {
        return new ConfigSearch1();
    }
}