<?php
/**
 * Created by PhpStorm.
 * User: zhanghongbo
 * Date: 2020-07-23
 * Time: 18:53
 */
namespace Service\Helper;

/**
 * Class Security
 * @package Service\Helper
 * @method void generateRandomString()
 */
class Security extends \yii\base\Security
{
    /**
     * 验证密码
     *
     * @param string $plain_password
     * @param string $hash
     * @return bool
     */
    public function validatePassword($plain_password, $hash)
    {
       return password_verify($plain_password, $hash);
    }

    /**
     * 生成密码
     * @param string $password
     * @param null $cost
     * @return string
     * @throws \yii\base\Exception
     */
    public function generatePasswordHash($password, $cost = null)
    {
        $password_hash = parent::generatePasswordHash($password);
        return Md5($password_hash);
    }
}