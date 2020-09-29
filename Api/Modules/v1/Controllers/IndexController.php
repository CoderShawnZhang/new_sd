<?php
namespace Api\Modules\v1\Controllers;

use Api\Controllers\BaseController;
use Service\Modules\User\UserService;
use yii\filters\Cors;
use yii\web\Response;

/**
 * Site controller
 */
class IndexController extends BaseController
{
	public $modelClass = 'Api\Modules\v1\Models\Order';
    public function behaviors()
    {
        return [
            'corsFilter'=>[
                'class' => Cors::className(),
                'cors'=>[
                    'Access-Control-Allow-Credentials' => false,
                    'Origin' => ['*'],
                ]
            ]
        ];
    }
    public function actionAbc()
	{
	    \Yii::$app->response->format = Response::FORMAT_JSON;
	    $result = [
	        'a' => 123,'b'=>123
        ];
	    // $result = UserService::searchAll();
		return $result;
	}
    public function actionAbc1()
    {
        \Yii::$app->response->format = Response::FORMAT_JSON;
        $result = [
            'a' => 666,'b'=>777
        ];
        return $result;
    }

	public function actionLogin()
    {
        \Yii::$app->response->format = Response::FORMAT_JSON;
        $result = [
            'a' => 123,'b'=>123
        ];

        return $result;
    }
}