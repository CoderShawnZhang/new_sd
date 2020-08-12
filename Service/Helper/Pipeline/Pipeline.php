<?php
/**
 * Created by PhpStorm.
 * User: zhanghongbo
 * Date: 2020-08-12
 * Time: 11:56
 */

namespace Service\Helper\Pipeline;

class Pipeline
{

    protected $pipes = [];

    protected $initData = [];

    public function through(array $pipes)
    {
        $this->pipes = is_array($pipes) ? $pipes : func_get_args();
        return $this;
    }

    public function send($initData)
    {
        $this->initData = $initData;
        return $this;
    }

    public function then($callback){
        $pipeline = array_reduce(
            $this->pipes,$this->carry(),$this->firstCallback($callback)
        );
        return $pipeline($this->initData);
    }

    protected function firstCallback($callback){
        return function ($passable) use ($callback) {
            return $callback($passable);
        };
    }

    public function carry()
    {
        return function($next,$pipe){
          return  function($params) use($next,$pipe){
            //输出
          };
        };
    }
}