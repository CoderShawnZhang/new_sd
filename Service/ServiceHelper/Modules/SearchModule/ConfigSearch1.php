<?php
/**
 * Created by PhpStorm.
 * User: zhanghongbo
 * Date: 2020-07-30
 * Time: 09:58
 */

namespace Service\ServiceHelper\Modules\SearchModule;


use Service\ServiceBase\SearchModule;
use Service\ServiceHelper\Models\Search\Config1SearchModel;

final class ConfigSearch1 extends SearchModule
{
    /**
     * 指定查询模型
     * @return Config1SearchModel
     */
    public static function getSearchClass()
    {
        return new Config1SearchModel();
    }
}