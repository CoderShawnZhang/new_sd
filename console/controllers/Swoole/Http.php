<?php

class Http
{
    private $http;

    public function __construct()
    {
        $this->http = new Swoole\Http\Server('0.0.0.0', 9501);
        $this->http->on('request', function ($request, $response) {
//            var_dump($request->server);
            $response->header("Content-Type", "text/html; charset=utf-8");
            $response->end("<h1>HTTP服务器返回，Hello Swoole. #".rand(1000, 9999)."</h1>");
        });
        $this->http->on('Start', [$this, 'onStart']);

        $this->http->start();
    }
    public function onStart($serv) {
        echo "#### onStart ####".PHP_EOL;
        echo "SWOOLE ".SWOOLE_VERSION . " 服务已启动".PHP_EOL;
        echo "master_pid: {$serv->master_pid}".PHP_EOL;
        echo "manager_pid: {$serv->manager_pid}".PHP_EOL;
        echo "########".PHP_EOL.PHP_EOL;
    }
}
$http = new Http();