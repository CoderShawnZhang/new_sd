<?php
/**
 * Created by PhpStorm.
 * User: zhanghongbo
 * Date: 2020-07-24
 * Time: 16:16
 */

namespace Service\Helper;


use Service\Base\SearchModel;
use Service\Helper\Models\Ar\ConfigAr;

final class ConfigService
{
    /**
     * @param $data
     * @return SearchModel
     */
//    public static function searchAll($data)
//    {
//        $c = new ConfigFacadeService($data);
//       return $c->getAll();
//    }
//
//    public static function searchOne($data)
//    {
//        $c = new ConfigFacadeService($data);
//        return $c->getOne();
//    }

    /**************************************************************************************************************************************************************************/
    /**
     * 根据指定KEY,获取value配置值
     * @param $key
     * @return mixed|string
     */
    public static function getValue($key)
    {
        $model = ConfigAr::find();
        $config = $model->where(['key' => $key])->one();//TODO 需要写到模型了
        return isset($config['value']) ? $config['value'] : '';
    }

    /**
     * @param $key
     * @param $value
     * @param string $desc
     */
    public static function setValue($key,$value,$desc = '')
    {
        $model = ConfigAr::find();
        $config = $model->where(['key' => $key])->one();//TODO 需要写到模型里
        if(empty($config)){
            $model = new ConfigAr();
            $model->key = $key;
            $model->value = $value;
            $model->desc = $desc;
            $model->save();
        } else {
            $config->value = $value;
            $config->save();
        }
    }

    /**
     * 获取顶部初始菜单id
     * @return mixed|string
     */
    public static function getTopInitMenu()
    {
        $model = ConfigAr::find();
        $config = $model->where(['key' => 'top_menu_init'])->one();//TODO 需要写到模型了
        return isset($config['value']) ? $config['value'] : '';
    }
}