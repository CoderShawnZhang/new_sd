<?php
/**
 * Created by PhpStorm.
 * User: zhanghongbo
 * Date: 2020-07-18
 * Time: 16:52
 */

namespace console\controllers;


use yii\console\Controller;

class BaseController extends Controller
{
    public function echoLine($str,$endOfLine = true)
    {
        echo $str;
        if($endOfLine){
            echo PHP_EOL;
        }
        die;
    }
}