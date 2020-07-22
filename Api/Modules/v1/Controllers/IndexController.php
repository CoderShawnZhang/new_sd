<?php
namespace Api\Modules\v1\Controllers;

use yii\web\Controller as BaseController;

/**
 * Site controller
 */
class IndexController extends BaseController
{
	public $modelClass = 'Api\Modules\v1\Models\Order';
	
    public function actionIndex()
	{

	    $a = 1;
	    $b = 2;
	    $c = $a+$b;
		var_dump(2222);die;
	}

	public function actionTest()
	{
		$res = shell_exec("cd /data/wwwroot/dengbei && git pull origin master");
		print_r($res);
		// var_dump(111);die;
	}
}