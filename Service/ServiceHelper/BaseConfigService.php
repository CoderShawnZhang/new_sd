<?php
/**
 * Created by PhpStorm.
 * User: zhanghongbo
 * Date: 2020-07-31
 * Time: 10:28
 */

namespace Service\ServiceHelper;


use Service\ServiceBase\Service;
use Service\ServiceHelper\Modules\Helper1Module;
use Service\ServiceHelper\Modules\StrategyFind;

class BaseConfigService extends Service
{
    public $loadModule;

    protected $moduleObject;

    /**
     * 可以通过外部注入模块
     * 服务层可以对外公开内部模块。
     *
     * ConfigService constructor.
     * @param null $model
     */
    public function __construct($model = null)
    {
        $this->loadModule = new Helper1Module();
        if($model!=null){
            $this->loadModule = $model;
        }
        $this->moduleObject = new StrategyFind($this->loadModule);
    }
}