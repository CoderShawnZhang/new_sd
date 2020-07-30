<?php
/**
 * Created by PhpStorm.
 * User: zhanghongbo
 * Date: 2020-07-30
 * Time: 09:22
 */
namespace Service\ServiceHelper\Modules\SearchModule;


use Service\ServiceBase\SearchModule;
use Service\ServiceHelper\Models\Search\ConfigSearchModel;

/**
 * 配置查询模块
 * Class ConfigSearch
 * @package Service\ServiceHelper\Modules\SearchModule
 */
final class ConfigSearch extends SearchModule
{
    /**
     * 指定查询模型
     *
     * @return ConfigSearchModel
     */
    public static function getSearchClass()
    {
        return new ConfigSearchModel();
    }
}