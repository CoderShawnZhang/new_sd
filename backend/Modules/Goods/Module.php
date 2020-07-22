<?php
namespace backend\Modules\Goods;

class Module extends \yii\base\Module
{
    public $controllerNamespace = 'backend\Modules\Goods\Controllers';
    public function init()
    {
        parent::init();
        $this->viewPath = '@backend/Modules/Goods/Views';
    }
}


