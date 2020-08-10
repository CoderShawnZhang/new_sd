<?php
/**
 * Created by PhpStorm.
 * User: zhanghongbo
 * Date: 2020-08-10
 * Time: 14:35
 */
namespace backend\Modules\User\Models;

use Service\Ars\Tables\UserTable;
use Service\Modules\User\UserService;
use yii\base\Model;

class UserModel extends Model
{
    /**
     * 获取客服列表
     *
     * @param array $condition
     * @return array
     */
    public static function getList(array $condition = [])
    {
        $list =   UserService::searchAll($condition);
        $count = UserService::searchCount($condition);
        $dataArray = [];
        foreach($list as $key => $val) {
            /** @var $val UserTable */
            $dataArray[$key] = $val->toArray();
            $dataArray[$key]['score'] = 100;
        }
        return [$list,$count];
    }
}