<?php
/**
 * Created by PhpStorm.
 * User: zhanghongbo
 * Date: 2020-08-03
 * Time: 14:16
 */

namespace Service\Old\Models;

/**
 * Class OldFwWarehouseInfo
 * @package Service\ServiceOld\Models
 * @property integer order_id
 * @property integer info_id
 */
class OldFwWarehouseInfo extends OldBaseModel
{
    public static function tableName()
    {
        return '{{%fw_warehouse_info}}';
    }
}