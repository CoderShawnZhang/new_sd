<?php
/**
 * Created by PhpStorm.
 * User: zhanghongbo
 * Date: 2020-08-03
 * Time: 14:10
 */
namespace Service\tests\fixtures\Old;

use yii\test\ActiveFixture;

class UserFixture extends ActiveFixture
{
    public $modelClass = 'Service\ServiceOld\Models\OldTestUser';
}