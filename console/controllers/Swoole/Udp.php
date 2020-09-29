<?php
/**
 * Created by PhpStorm.
 * User: zhanghongbo
 * Date: 2020-09-17
 * Time: 14:17
 */

class Udp
{
    public function __construct()
    {
        $server = new Swoole\Server('127.0.0.1', 9502, SWOOLE_PROCESS, SWOOLE_SOCK_UDP);

        //监听数据接收事件
        $server->on('Packet', function ($server, $data, $clientInfo) {
            var_dump($clientInfo);
            $server->sendto($clientInfo['address'], $clientInfo['port'], 'Server：' . $data);
        });

        //启动服务器
        $server->start();
    }
}

$udp = new Udp();