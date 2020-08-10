<?php
/**
 * Created by PhpStorm.
 * User: zhanghongbo
 * Date: 2020-08-03
 * Time: 15:17
 */

namespace Service\Old\Models;


/**
 * Class OldFakerRecord
 * @package Service\ServiceOld\Models
 */
class OldFakerRecord extends OldBaseModel
{
    public static function tableName()
    {
        return '{{%faker_record}}';
    }
}