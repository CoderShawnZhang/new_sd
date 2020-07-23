<?php
/**
 * Created by PhpStorm.
 * User: zhanghongbo
 * Date: 2020-07-23
 * Time: 09:57
 */

namespace backend\controllers;


use yii\web\Controller;

class HookController extends Controller
{
    public $layout = false;
    public $enableCsrfValidation = false;

    public function actionHook()
    {
        error_reporting(1);
        //项目仓库文件夹路径1111
        $dir = '/data/wwwroot/dengbei';
        // Coding新版本的webhook若是设置了token，Coding则对每个请求进行了哈希签名
        // 这个签名会放在请求头 X-Coding-Signature，在服务器端我们需要进行签名解析才能拿到真正数据
        // token验证令牌，与Coding webhook上设置的一致，用于与Coding进行身份验证,防止恶意提交代码222
        $token = 'sodeng_hook';
        // 从请求头中获取签名
        $signature = $_SERVER['HTTP_X_CODING_SIGNATURE'];
        if(empty($signature)){
            $signature = $_SERVER['HTTP_X_HUB_SIGNATURE'];
        }
        // 接收Coding post传递的参数
        $json_post = file_get_contents('php://input');
        // 进行签名解析
        $sha1 = hash_hmac("sha1", $json_post, $token);
        $calculate_signature = 'sha1=' . $sha1;
        // exit($this->base64UrlEncode($token));
        // 进行身份验证
        if ($calculate_signature !== $signature) {
            header('HTTP/1.1 403 Permission Denied');
            die('Permission denied.');
        }
        if (!is_dir($dir)) {
            header('HTTP/1.1 500 Internal Server Error');
            die('Local directory is missing');
        }
        shell_exec("cd {$dir} && git pull origin master");
        die("done " . date('Y-m-d H:i:s', time()));
    }

//    private function base64UrlEncode($str)
//    {
//        $find = array('+', '/');
//        $replace = array('-', '_');
//        return str_replace($find, $replace, base64_encode($str));
//    }
}