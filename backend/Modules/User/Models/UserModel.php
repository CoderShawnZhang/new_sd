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
            $dataArray[$key]['score'] = rand(1,10);//客服评分
            $dataArray[$key]['customer_count'] = rand(1,9999);//客户量-通过模型关联获取
            $dataArray[$key]['complaint_count'] = rand(1,9999);//投诉量-通过模型关联获取
            $dataArray[$key]['satisfied_count'] = rand(1,9999);//满意度-通过模型关联获取
            $dataArray[$key]['refund_count'] = rand(1,9999);//退款额-通过模型关联获取
            $dataArray[$key]['week_sale_count'] = rand(1,9999);//周售额-通过模型关联获取
            $dataArray[$key]['month_sale_count'] = rand(1,9999);//月售额-通过模型关联获取
            $dataArray[$key]['year_sale_count'] = rand(1,9999);//年售额-通过模型关联获取
        }
        return [$dataArray,$count];
    }
}