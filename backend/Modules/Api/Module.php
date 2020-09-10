<?php
/**
 * Created by PhpStorm.
 * User: zhanghongbo
 * Date: 2020-07-26
 * Time: 14:28
 */
namespace backend\Modules\Api;

class Module extends \yii\base\Module
{
    public $controllerNamespace = 'backend\Modules\Api\Controllers';

    public function init()
    {
        parent::init();
        $this->viewPath = '@backend/Modules/Api/Views';
    }
}