<?php
/**
 * Created by PhpStorm.
 * User: zhanghongbo
 * Date: 2020-08-03
 * Time: 09:37
 */
namespace Service\ServiceOld\Models;

class OldUser extends OldBaseModel
{
    public static function tableName()
    {
        return '{{%user}}';
    }
}