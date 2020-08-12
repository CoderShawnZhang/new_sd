<?php
/**
 * Created by PhpStorm.
 * User: zhanghongbo
 * Date: 2020-07-30
 * Time: 09:56
 */

namespace Service\Base;

use yii\base\Component;

abstract class Service extends Component implements ServiceInterface
{

    /**
     * 实现接口，供子类重写
     * @return mixed|void
     */
    public static function getSearchClass()
    {
        // TODO: Implement getSearchClass() method.
    }

    /**
     * @param array $condition
     * @return SearchModel|null
     */
    public static function searchOne(array $condition = [])
    {
        $model = static::getSearchModel($condition);
        return $model->search()->getOne();
    }

    public static function searchAll(array $condition = [])
    {
        $model = static::getSearchModel($condition);
        return $model->search()->getAll();
    }

    public static function searchCount(array $condition = [])
    {
        $model = static::getSearchModel($condition);
        return $model->search()->getCount();
    }


    /**
     * @param array $condition
     * @return SearchModel|null
     */
    public static function getSearchModel(array $condition = [])
    {
        /**
         * @var SearchModel $searchModel
         */
        $searchModel = static::getSearchClass();
        if (!empty($condition) && (!$searchModel->load($condition, '') || !$searchModel->validate())) {
            return null;
        }
        return $searchModel;
    }
}