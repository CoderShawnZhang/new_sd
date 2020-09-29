<?php
/**
 * Created by PhpStorm.
 * User: zhanghongbo
 * Date: 2020-07-26
 * Time: 14:28
 */
namespace backend\Modules\Swoole;

class Module extends \yii\base\Module
{
    public $controllerNamespace = 'backend\Modules\Swoole\Controllers';

    public function init()
    {
        parent::init();
        $this->viewPath = '@backend/Modules/Swoole/Views';
    }
}