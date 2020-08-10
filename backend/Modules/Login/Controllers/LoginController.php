<?php

namespace backend\Modules\Login\Controllers;

use Service\Modules\User\Models\UserBaseModel;
use Service\Modules\User\Models\UserLoginModel;
use Service\Modules\User\UserService;
use yii\db\conditions\InCondition;
use yii\web\Controller;
use Yii;

/**
 * 登录控制器
 */
class LoginController extends Controller
{
    public $layout = '@app/views/layouts/login.php';

    /**
     * 登录 [需要重构]
     */
    public function actionLogin()
    {
        if (!\Yii::$app->user->isGuest) {
            return $this->goHome(['/site/index']);
        }
        $model = new UserLoginModel(['scenario' => 'login']);
        $postData = \Yii::$app->request->post();
        if(!empty($postData)){
            try{
                //检查是否登录成功
                if(UserService::checkLogin($postData,$model)){
                    $jumpUrl = \Yii::$app->request->post('jumpUrl');
                    return empty($jumpUrl) ? $this->redirect(['/site/index']) : $this->redirect(urldecode($jumpUrl));
                }
            } catch (\Exception $e){
                $model->clearErrors();
                $model->addError('password', $e->getMessage());
            }
        }
        return $this->render('index',[
            'model' => $model
        ]);


    }

    /**
     * 退出
     * @return \yii\web\Response
     */
    public function actionLogout()
    {
        \Yii::$app->user->logout();
        return $this->redirect('/Login/login/login');
    }
}
