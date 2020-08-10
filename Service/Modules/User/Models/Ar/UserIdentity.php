<?php
/**
 * 用户身份验证类
 */

namespace Service\Modules\User\Models\Ar;


use Service\Ars\Tables\UserTable;
use yii\web\IdentityInterface;
use Yii;
/**
 * Class UserIdentity
 * @package Service\Modules\User\Models\Ar
 * @property string $password write-only password
 * @property string $username
 */
class UserIdentity extends UserTable implements IdentityaInterface
{
    const USER_STATUS_0 = 10; // 正常 10 RBAC初始化user表status默认值
    const USER_STATUS_1 = 11; // 停用
    const USER_STATUS_2 = 12; // 锁定

    /**
     * @return string
     */
    public static function tableName()
    {
        return '{{%user}}';
    }

    /**
     * @param $username
     * @return array|UserTable|UserIdentity|null
     */
    public function getUserInfo($username)
    {
        $model = self::find()->Where(['username' => $username])->one();
        if(!empty($model)) {
            $this->password_hash = $model->password_hash;
            $this->password = $model->password;
        }
        return $model;
    }

    /**
     * @param $password
     * @return bool
     */
    public function validatePassword($password)
    {
        $res1 = \Yii::$app->security->validatePassword($password, $this->password_hash);
        $res2 = hash_equals((string)md5($this->password_hash),(string)$this->password);
        return $res1 && $res2;
    }

    /**
     * @param $password
     * @throws \yii\base\Exception
     */
    public function setPasswordHash($password)
    {
        $this->password_hash = \Yii::$app->security->generatePasswordHash($password);
    }

    /**
     * @param $password
     * @throws \yii\base\Exception
     */
    public function setPassword($password){
        $this->setPasswordHash($password);
        $this->password = Md5($this->password_hash);
    }

    /**
     * @throws \yii\base\Exception
     */
    public function generateAuthKey()
    {
        $this->auth_key = Yii::$app->security->generateRandomString();
    }

    /**
     * @throws \yii\base\Exception
     */
    public function generatePasswordResetToken()
    {
        /**
         * @var Yii::$app->security yii\base\Security;
         */
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
     * @return string
     */
    public function getAuthKey(){
        return $this->auth_key;
    }

    /**
     * @param string $authKey
     * @return bool
     */
    public function validateAuthKey($authKey){
        return $this->getAuthKey() === $authKey;
    }

}