<?php
/**
 * Created by PhpStorm.
 * User: zhanghongbo
 * Date: 2020-08-12
 * Time: 17:53
 */

namespace Service\Helper\Tools;


class ArrayHelper extends \yii\helpers\ArrayHelper
{
    /**
     * @param array|object $array
     * @param array|\Closure|string $key
     * @param null $default
     * @return mixed|null
     * @throws \Exception
     */
    public static function getValue($array, $key, $default = null)
    {
        $value = parent::getValue($array, $key, $default);
        return isset($value) ? $value : $default;
    }

}