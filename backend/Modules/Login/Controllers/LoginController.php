<?php

namespace backend\Modules\Login\Controllers;

use Service\ServiceModules\ServiceUser\Models\UserBaseModel;
use Service\ServiceModules\ServiceUser\Models\UserLoginModel;
use Service\ServiceModules\ServiceUser\UserService;
use yii\db\conditions\InCondition;
use yii\web\Controller;
use Yii;

/**
 * 登录控制器
 */
class LoginController extends Controller
{
    public $layout = '@app/views/layouts/login.php';

    public function actionLogin()
    {
        if (!Yii::$app->user->isGuest) {
            return $this->goHome(['user/index']);
        }

        $model = new UserLoginModel(['scenario' => 'login']);

        if ($model->load(Yii::$app->request->post())) {
//            $service = new UserService();
//            $data = json_decode($service->checkStatus($model->mobile));

//            if ($data->code === '1072') {
//                Yii::$app->session->setFlash('error', '账号被锁定, 请联系店长解锁账号.');
//            } else if ($data->code === '1073') {
//                Yii::$app->session->setFlash('error', '账号不存在.');
//            } else {
                if ($model->login()) {
//                    if (Yii::$app->user->identity->type != 1) {
//                        Yii::$app->user->logout();
//                        Yii::$app->session->setFlash('error', '不允许登陆!');
//                        Yii::$app->user->loginRequired();
//                    }
                    $jumpUrl = Yii::$app->request->post('jumpUrl');
                    return empty($jumpUrl)
                        ? $this->redirect(['/site/index']) : $this->redirect(urldecode($jumpUrl));

                }
//            }
        }
//        $this->layout = '@Anlewo/Order/views/layouts/main-login';
        return $this->render('index', [
            'model' => $model,
        ]);
    }
    /**
     * 登录
     */
    public function actionLogin1()
    {
        if (!\Yii::$app->user->isGuest) {
            return $this->goHome(['/site/index']);
        }
        $model = new UserLoginModel(['scenario' => 'login']);
        $postData = \Yii::$app->request->post();
        if(!empty($postData)){
            try{

                //检查是否登录成功
//            if(UserService::checkLogin($postData,$model)){
                UserService::checkLogin($postData,$model);
                $jumpUrl = \Yii::$app->request->post('jumpUrl');
                return empty($jumpUrl) ? $this->redirect(['/site/index']) : $this->redirect(urldecode($jumpUrl));
//            }
            } catch (\Exception $e){
                $model->clearErrors();
                $model->addError('password', $e->getMessage());
            }
        } else {
            return $this->render('index',[
                'model' => $model
            ]);
        }


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
