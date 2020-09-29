<?php
/**
 * Created by PhpStorm.
 * User: zhanghongbo
 * Date: 2020-08-24
 * Time: 15:30
 */

namespace backend\Modules\Goods\Controllers;

use backend\controllers\BaseController;

class CateController extends BaseController
{
    public function actionIndex()
    {
//        echo phpinfo();
//        die;
    	//json_decode
    	//json_encode
    	//urldecode
    	//urlencode
    	//htmlspecialchars_decode(string)
//    	$str = "我是你大爷";
//    	echo urlencode($str) . "<br>";
//    	echo urldecode(urlencode($str)) . "<br>";
//
//    	$arr = ['a' => 1,'b' => 2,'c' => 3];
//    	$encode =  json_encode($arr);
//    	echo $encode . "<br>";
//    	$tt = json_decode($encode,true);
//    	print_r($tt['a']);
//
//    	echo "<br><br><br><br><br>";
//    	$arr1 = ['a' => urlencode('AA发撒风'),'b' => 2,'c' => 3];
//    	$encode =  json_encode($arr1);
//    	echo $encode;
//    	echo urldecode($encode) . "<br>";


//     	$t = '["https%3A%2F%2Fxcx.sodeng.cc%2FPublic%2Fdelivery%2F202009tmp_c5a025ab4dba13710904e8b13e5c00f4857c7e92fb6e1d59.jpg"]';
//     	$imagePaths = urldecode($t);
// 		$imageArray = json_decode($imagePaths,true);
// 		$ttt = urlencode('https://xcx.sodeng.cc/Public/delivery/202009tmp_c5a025ab4dba13710904e8b13e5c00f4857c7e92fb6e1d59.jpg');
// 		echo '["'.$ttt.'"]';
// 		echo "<br>";
// 		echo $t;
// 		var_dump($imageArray);die;
// 		echo $imageArray;
// //       echo phpinfo();
         return $this->render('index');
    }
}