<?php
namespace backend\controllers;

use Codeception\Command\Shared\Config;
use console\models\MenuAr;
use Service\ServiceHelper\ConfigService;
use Service\ServiceHelper\Models\Ar\ConfigAr;
use Service\ServiceModules\ServiceUser\UserService;
use Yii;
use yii\debug\models\search\Db;
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
     * @return string
     * @throws \yii\web\ForbiddenHttpException
     */
    public function actionIndex()
    {
        $user = Yii::$app->getUser();
        if ($user->getIsGuest()) {
            $user->loginRequired();
        } else {
            return $this->render('index');
        }
    }
    /**
     * 获取菜单列表
     * @test
     */
    private function getLeftMenu()
    {
        $get = Yii::$app->request->get();
        $top_menu_id = isset($get['top_menu_id']) ? $get['top_menu_id'] : '';
        if(empty($top_menu_id)){
            $top_menu_id = $this->getTopMenuInitParenId();
        }
        //缓存key
        $cacheKey = $top_menu_id.'_left_menu';
        $cache = Yii::$app->cache;
        $cacheRes = $cache->get($cacheKey);
        if($cacheRes){
//            return $cacheRes;
        }
        $menu = MenuAr::find()->where(['parent'=>$top_menu_id])->all();
        $menuArray = [];
        foreach($menu as $key => $val){
            $menuArray[] = $val->toArray(['id','name','parent','route','order','data'],['children']);
        };
        $cache->set($cacheKey,$menuArray);
        return $menuArray;
    }

    private function getTopMenuInitParenId()
    {
        return  ConfigService::getTopInitMenu();
    }

    /**
     * @return array|mixed
     */
    private function getTopMenu()
    {
        $cache = Yii::$app->cache;
        $cacheRes = $cache->get('top_menu');
        if($cacheRes){
//            return $cacheRes;
        }
        $menu = MenuAr::find()->where("data LIKE '%\"top\"%'")->all();
        $menuArray = [];
        foreach($menu as $key => $val){
            $menu_data = json_decode($val['data'],true);
            if(isset($menu_data['top_show']) == 'false'){
               continue;
            }
            $expend = ['children'];
//            if(isset($menu_data['show_child']) == 'false'){
//                $expend = [];
//            }
            $menuArray[] = $val->toArray(['id','name','parent','route','order','data'],$expend);
        };
        $cache->set('top_menu',$menuArray);
        return $menuArray;
    }

    /**
     *
     */
    public function actionClearCache()
    {
        Yii::$app->cache->flush();
        $notice = '菜单缓存清理成功';
        echo html_entity_decode($notice, ENT_QUOTES, 'UTF-8');
    }

    /**
     * @return array
     */
    public function actionLeftMenu()
    {
        Yii::$app->response->format = Response::FORMAT_JSON;
        return [
            'menu' => $this->getLeftMenu(),
            'success' => 22,
            'msg' => 11,
        ];
    }

    /**
     * @return array
     */
    public function actionTopMenu()
    {
        $get = Yii::$app->request->get();
        Yii::$app->response->format = Response::FORMAT_JSON;
        return [
            'menu' => $this->getTopMenu(),
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
