<?php

namespace backend\Modules\Login;

/**
 * Module module definition class
 */
class Module extends \yii\base\Module
{
    /**
     * {@inheritdoc}
     */
    public $controllerNamespace = 'backend\Modules\Login\Controllers';

    /**
     * {@inheritdoc}
     */
    public function init()
    {
        parent::init();
        $this->viewPath = '@backend/Modules/Login/Views';
        // custom initialization code goes here
    }
}
