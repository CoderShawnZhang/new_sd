<?php
/**
 * Created by PhpStorm.
 * User: zhanghongbo
 * Date: 2020-07-31
 * Time: 11:11
 */

namespace Service\ServiceHelper;

/**
 *
 * Class ConfigFacadeService
 * @package Service\ServiceHelper
 */
final class ConfigFacadeService extends BaseConfigService
{
    private $model;

    /**
     * ConfigFacadeService constructor.
     * @param $condition
     * @param null $model
     */
    public function __construct($condition,$model = null)
    {
        parent::__construct($model);
        $this->model = $this->moduleObject->run();
        if (!empty($condition) && (!$this->model->load($condition, '') || !$this->model->validate())) {
            return null;
        }
    }

    public function getOne()
    {
        return $this->model->search()->getOne();
    }

    public function getAll()
    {
        return $this->model->search()->getOne();
    }
}