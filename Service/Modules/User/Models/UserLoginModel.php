<?php
/**
 * Created by PhpStorm.
 * User: zhanghongbo
 * Date: 2020-07-23
 * Time: 17:10
 */
namespace Service\Modules\User\Models;

use Service\Ars\Tables\UserTable;
use Service\Modules\User\Models\Ar\UserIdentity;

/**
 * Class UserLoginModel
 * @package Service\Modules\User\Models
 * @property string $password write-only password
 */
class UserLoginModel extends UserTable
{
    const ACCOUNT_TYPE_DISABLE =  0;//账号不允许登录类型
    public $rememberMe = true;

    private $_userInfo = null;

    public function rules()
    {
        return [
            [['username'],'string'],
            ['password', 'required', 'message' => '密码不能为空！'],
            [['password_hash'], 'string', 'max' => 255],
            ['password', 'validatePassword'],
        ];
    }

    public function attributeLabels()
    {
        return [
            'username' => '账号',
            'password' => '密码'
        ];
    }

    /**
     * @inheritdoc
     */
    public function scenarios()
    {
        $scenarios = parent::scenarios();
        $scenarios['login'] = ['username','password'];
        return $scenarios;
    }

    public function validatePassword($attribute)
    {
        if (!$this->hasErrors()) {
            $user = $this->getUserInfo();
            if (!$user || !$user->validatePassword($this->password)) {
                $this->addError($attribute, '帐号或密码错误，请重新输入');
            }
        }
    }

    /**
     * 检查登录数据
     *
     * @param array $loginData
     * @param $model UserLoginModel
     * @return mixed
     * @throws \Exception
     */
    public function checkLoginData($loginData,$model)
    {
        if($model->load($loginData,'UserLoginModel')){
            //触发验证器
            if (!$model->validate()) {
                 throw new \Exception($model->errors['password'][0]);
            }
            $status =$this->checkLoginStatus();
            if($status == 0){
                throw new \Exception('账号被禁用');
            }
            if(!$model->login()){
                throw new \Exception('账号不允许登录');
            }
            return $model;
        }
        return false;
    }

    /**
     * @return bool
     */
    public function login(){
        if ($this->validate()) {
            return \Yii::$app->user->login($this->getUserInfo(), $this->rememberMe ? 3600 * 24 * 30 : 0);
        } else {
            return false;
        }
    }

    /**
     * @return array|UserIdentity|\yii\db\ActiveRecord|null
     */
    protected function getUserInfo()
    {
        if($this->_userInfo == null){
            $userInfo = new UserIdentity();
            $this->_userInfo = $userInfo->getUserInfo($this->username);
        }
        return $this->_userInfo;
    }

    /**
     * @return int
     */
    public function checkLoginStatus(){
        $userInfo = $this->getUserInfo();
        if($userInfo['status'] == 11){
            return 0;
        }
        return 1;
    }
}