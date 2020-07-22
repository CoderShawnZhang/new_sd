<?php
namespace backend\controllers;

use console\models\MenuAr;
use Yii;
use yii\helpers\Html;
use yii\web\Controller;
use yii\filters\VerbFilter;
use yii\filters\AccessControl;
use common\models\LoginForm;
use yii\web\Response;

/**
 * Site controller
 */
class SiteController extends Controller
{

    /**
     * {@inheritdoc}
     */
    // public function behaviors()
    // {
    //     return [
    //         'access' => [
    //             'class' => AccessControl::className(),
    //             'rules' => [
    //                 [
    //                     'actions' => ['login', 'error'],
    //                     'allow' => true,
    //                 ],
    //                 [
    //                     'actions' => ['logout'],
    //                     'allow' => true,
    //                     'roles' => ['@'],
    //                 ],
    //             ],
    //         ],
    //         'verbs' => [
    //             'class' => VerbFilter::className(),
    //             'actions' => [
    //                 'logout' => ['post'],
    //             ],
    //         ],
    //     ];
    // }

    /**
     * {@inheritdoc}
     */
    public function actions()
    {
        return [
            'error' => [
                'class' => 'yii\web\ErrorAction',
            ],
        ];
    }

    /**
     * Displays homepage.
     *
     * @return string
     */
    public function actionIndex()
    {
//        echo phpinfo();die;
        return $this->render('index');
    }

    public function actionHook()
    {
        error_reporting(1);

// 项目仓库文件夹路径
        $dir =  '/data/wwwroot/dengbei';


// Coding新版本的webhook若是设置了token，Coding则对每个请求进行了哈希签名
// 这个签名会放在请求头 X-Coding-Signature，在服务器端我们需要进行签名解析才能拿到真正数据

// token验证令牌，与Coding webhook上设置的一致，用于与Coding进行身份验证,防止恶意提交代码
        $token = 'sodeng_hook';

// 从请求头中获取签名
        $signature = $_SERVER['HTTP_X_CODING_SIGNATURE'];

// 接收Coding post传递的参数
        $json_post = file_get_contents('php://input');

// 进行签名解析
        $sha1 = hash_hmac("sha1",$json_post,$token);

        $calculate_signature = 'sha1='. $sha1;

// 进行身份验证
        if ($calculate_signature !== $signature) {
            exit('error request');
        }
        echo shell_exec("cd $dir && git checkout -f && git pull origin master 2>&1");
    }
    /**
     * 获取菜单列表
     * @test
     */
    private function getMenu()
    {
        $get = Yii::$app->request->get();
        $top_menu_id = $get['top_menu_id'];
        $cache = Yii::$app->cache;
        $cacheRes = $cache->get('menu');
        if($cacheRes){
            return $cacheRes;
        }
        $menu = MenuAr::find()->where(['parent'=>null])->all();
        $menuArray = [];
        foreach($menu as $key => $val){
            $menuArray[] = $val->toArray(['id','name','parent','route','order','data'],['children']);
        };
        $cache->set('menu',$menuArray);
        return $menuArray;
    }

    public function actionClearCache()
    {
        Yii::$app->cache->flush();
        $notice = '菜单缓存清理成功';
        echo html_entity_decode($notice, ENT_QUOTES, 'UTF-8');
    }


    /**
     * @test
     */
    private function getMenu1()
    {
        $menuArray = [
            [
                'id' => 2,'pid' => 1,'title' => '主菜单1','icon' => 'layui-icon-location','url'=>'/site/welcome','target' => '_self',
                'children'=>[
                    ['id' => 4,'pid' => 2,'title' => '1-子菜单1','icon' => 'layui-icon-read','url'=>'/site/welcome','target' => '_self'],
                ]
            ],
            [
                'id' => 3,'pid' => 1,'title' => '主菜单2','icon' => 'layui-icon-face-smile','url'=>'/site/welcome','target' => '_self',
                'children'=>[
                    ['id' => 7,'pid' => 3,'title' => '2-子菜单1','icon' => 'layui-icon-find-fill','url'=>'/site/welcome','target' => '_self'],
                    ['id' => 8,'pid' => 3,'title' => '2-子菜单2','icon' => 'layui-icon-speaker','url'=>'/site/welcome','target' => '_self'],
                ]
            ]
        ];
        return $menuArray;
    }

    public function actionMenu()
    {
        Yii::$app->response->format = Response::FORMAT_JSON;

        return [
            'menu' => $this->getMenu(),
            'success' => 22,
            'msg' => 11,
        ];
    }

    public function actionTop()
    {

        $get = Yii::$app->request->get();
        $type = isset($get['type']) ? $get['type'] : 0;

        Yii::$app->response->format = Response::FORMAT_JSON;
        return [
            'menu' => $this->getMenu1(),
            'success' => 22,
            'msg' => 11,
        ];
    }
    /**
     * Login action.
     *
     * @return string
     */
    public function actionLogin()
    {
        $this->layout = "@backend/views/layouts/login";
        if (!Yii::$app->user->isGuest) {
            return $this->goHome();
        }

        $model = new LoginForm();
        if ($model->load(Yii::$app->request->post()) && $model->login()) {
            return $this->goBack();
        } else {
            $model->password = '';

            return $this->render('login', [
                'model' => $model,
            ]);
        }
    }
//    public $layout = 'header';   //定义父模板名为home
    public function actionWelcome(){
        $this->layout = false;

        return $this->render('welcome');
    }

    /**
     * Logout action.
     *
     * @return string
     */
    public function actionLogout()
    {
        Yii::$app->user->logout();

        return $this->goHome();
    }
}
