<?php
/**
 * Created by PhpStorm.
 * User: zhanghongbo
 * Date: 2020-07-16
 * Time: 18:34
 */
namespace Service\Exception;

class BaseException extends \yii\base\Exception
{
    /**
     * BaseException constructor.
     * @param string $message
     * @param int $code
     */
    public function __construct(string $message = "", int $code = 0)
    {
        parent::__construct($message, $code);
    }

    /**
     * @return string
     */
    public function getName()
    {
        return 'BaseException';
    }
}