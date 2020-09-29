<?php
/**
 * Created by PhpStorm.
 * User: zhanghongbo
 * Date: 2020-09-24
 * Time: 12:14
 */

namespace Service\Helper;


use backend\Modules\Swoole\Models\ChatOnlineModels;

class Swoole
{
    public static function add()
    {
        return ChatOnlineModels::find();
    }
}