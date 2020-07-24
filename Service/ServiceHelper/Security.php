<?php
/**
 * Created by PhpStorm.
 * User: zhanghongbo
 * Date: 2020-07-23
 * Time: 18:53
 */
namespace Service\ServiceHelper;

class Security extends \yii\base\Security
{
    /**
     * 验证密码
     * @param string $password
     * @param string $hash
     * @return bool
     */
    public function validatePassword($password, $hash)
    {
       return $this->compareString((string)md5($password),(string)$hash);
    }

    /**
     * 生成密码
     * @param string $password
     * @param null $cost
     * @return string
     */
    public function generatePasswordHash($password, $cost = null)
    {
        return (string)md5($password);
    }
}