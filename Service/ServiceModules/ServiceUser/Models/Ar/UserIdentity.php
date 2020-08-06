<?php
/**
 * 用户身份验证类
 */

namespace Service\ServiceModules\ServiceUser\Models\Ar;


use Service\Ars\Tables\CustomerTable;
use Service\Ars\Tables\UserTable;
use yii\web\IdentityInterface;
use Yii;
/**
 * Class UserIdentity
 * @package Service\ServiceModules\ServiceUser\Models\Ar
 * @property string $password write-only password
 * @property string $username
 */
class UserIdentity extends UserTable implements IdentityaInterface
{
    const USER_STATUS_0 = 10; // 正常 10 RBAC初始化user表status默认值
    const USER_STATUS_1 = 11; // 停用
    const USER_STATUS_2 = 12; // 锁定


    public static function tableName()
    {
        return '{{%user}}';
    }

    public function getUserInfo($username)
    {
        $model = self::find()->Where(['username' => $username])->one();
        if(!empty($model)) {
            $this->password_hash = $model->password_hash;
            $this->password = $model->password;
        }
        return $model;
    }
    public function validatePassword($password)
    {
        $res = \Yii::$app->security->validatePassword($password, $this->password_hash,$this->password);
        return $res;
    }

    public function setPasswordHash($password)
    {
        $this->password_hash = \Yii::$app->security->generatePasswordHash($password);
    }

    public function setPassword($password){
        $this->setPasswordHash($password);
        $this->password = Md5($this->password_hash);
    }

    /**
     * Generates "remember me" authentication key
     */
    public function generateAuthKey()
    {
        $this->auth_key = Yii::$app->security->generateRandomString();
    }

    /**
     * Generates new password reset token
     */
    public function generatePasswordResetToken()
    {
        $this->password_reset_token = Yii::$app->security->generateRandomString() . '_' . time();
    }

    /**
     * @param int|string $id
     * @return UserIdentity|IdentityInterface|null
     */
    public static function findIdentity($id)
    {
        return static::findOne(['id' => $id, 'status' => self::USER_STATUS_0]);
    }
    /**
     * Finds user by username
     *
     * @param string $username
     * @return static|null
     */
    public static function findByUsername($username)
    {
        return static::find()->Where(['mobile' => $username])->one();
    }

    /**
     * @param mixed $token
     * @param null $type
     * @return void|IdentityInterface|null
     * @throws \Exception
     */
    public static function findIdentityByAccessToken($token, $type = null){
        throw new \Exception('"findIdentityByAccessToken" is not implemented.');
    }

    /**
     * Finds user by password reset token
     *
     * @param string $token password reset token
     * @return static|null
     */
    public static function findByPasswordResetToken($token)
    {
        if (!static::isPasswordResetTokenValid($token)) {
            return null;
        }

        return static::findOne([
            'password_reset_token' => $token,
            'status' => self::USER_STATUS_0,
        ]);
    }

    /**
     * Finds out if password reset token is valid
     *
     * @param string $token password reset token
     * @return boolean
     */
    public static function isPasswordResetTokenValid($token)
    {
        if (empty($token)) {
            return false;
        }

        $timestamp = (int) substr($token, strrpos($token, '_') + 1);
        $expire = Yii::$app->params['user.passwordResetTokenExpire'];
        return $timestamp + $expire >= time();
    }

    /**
     * @inheritdoc
     */
    public function getId(){
        return $this->getPrimaryKey();
    }

    /**
     * @return string|void
     */
    public function getAuthKey(){
        return $this->auth_key;
    }

    /**
     * @param string $authKey
     * @return bool|void
     */
    public function validateAuthKey($authKey){
        return $this->getAuthKey() === $authKey;
    }

}