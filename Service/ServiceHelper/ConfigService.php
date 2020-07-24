<?php
/**
 * Created by PhpStorm.
 * User: zhanghongbo
 * Date: 2020-07-24
 * Time: 16:16
 */

namespace Service\ServiceHelper;


use Service\ServiceHelper\Models\Ar\ConfigAr;

class ConfigService
{
    const TOP_INIT_MENU_KEY = 'top_menu_init';
    /**
     * @param $key
     * @return mixed|string
     */
    public static function getValue($key)
    {
        $model = ConfigAr::find();
        $config = $model->where(['key' => $key])->one();
        return isset($config['value']) ? $config['value'] : '';
    }

    public static function getTopInitMenu()
    {
        $model = ConfigAr::find();
        $config = $model->where(['key' => self::TOP_INIT_MENU_KEY])->one();
        return isset($config['value']) ? $config['value'] : '';
    }
}