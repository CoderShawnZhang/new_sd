<?php
/**
 * Created by PhpStorm.
 * User: zhanghongbo
 * Date: 2020-07-21
 * Time: 16:42
 */
namespace Service\ServiceBase;

use Service\ServiceBase\Interfaces\SearchModuleInterface;
use yii\base\Model;

abstract class SearchModule extends Model implements SearchModuleInterface
{
    /**
     * @param array $condition
     */
    public function getDetail(array $condition)
    {
        $searchModel = static::getSearchModel($condition);
        $searchModel->search()->getOne();
    }

    /**
     * @param array $condition
     */
    public function getList(array $condition)
    {
        $searchModel = static::getSearchModel($condition);
        $searchModel->search()->getAll()();
    }

    /**
     * 定位到查询模型
     *
     * @param $condition
     * @return SearchModel|null
     */
    public static function getSearchModel($condition){
        /**
         * @var $searchModel SearchModel
         */
        $searchModel = static::getSearchClass();
        if(!$searchModel->load($condition,'') || !$searchModel->validate()){
            return null;
        }
        return $searchModel;
    }
}