<?php
/**
 * Created by PhpStorm.
 * User: zhanghongbo
 * Date: 2020-07-24
 * Time: 16:21
 */
namespace console\controllers\Swoole;

use yii\console\Controller;

class TestController extends Controller
{
    // sw tcp 服务
    private $_tcp;

    // 入口函数
    public function actionRun()
    {
        //创建Server对象，监听 127.0.0.1:9501端口
        $serv = new \swoole_http_server("0.0.0.0", 9501);

        $serv->on('request', function ($request, $response) {
            var_dump($request->get, $request->post);
            $response->header("Content-Type", "text/html; charset=utf-8");
            $response->end("<h1>Hello Swoole. #".rand(1000, 9999)."</h1>");
        });

        $serv->start();

////监听连接进入事件
//        $serv->on('connect', function ($serv, $fd) {
//            echo "Client: Connect.\n";
//        });
//
////监听数据接收事件
//        $serv->on('receive', function ($serv, $fd, $from_id, $data) {
//            $serv->send($fd, "Server: ".$data);
//        });
//
////监听连接关闭事件
//        $serv->on('close', function ($serv, $fd) {
//            echo "Client: Close.\n";
//        });
//
////启动服务器
//        $serv->start();
    }
}