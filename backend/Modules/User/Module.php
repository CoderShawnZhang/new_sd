<?php
/**
 * Created by PhpStorm.
 * User: zhanghongbo
 * Date: 2020-07-26
 * Time: 14:28
 */
namespace backend\Modules\User;

class Module extends \yii\base\Module
{
    public $controllerNamespace = 'backend\Modules\User\Controllers';

    public function init()
    {
        parent::init();
        $this->viewPath = '@backend/Modules/User/Views';
    }
}