<?php
//namespace console\controllers\Swoole;

class WebSocket
{
    /**
     * @var Swoole\WebSocket\Server
     */
    private $ws;

    public function __construct()
    {
        //创建WebSocket Server对象，监听0.0.0.0:9502端口
        $this->ws = new Swoole\WebSocket\Server('0.0.0.0', 9502);

        $this->ws->on('open',[$this,'onOpen']);
        $this->ws->on('message',[$this,'omMessage']);
        $this->ws->on('close',[$this,'omClose']);
        echo '12312321312';
        $this->ws->start();

    }
    public function onOpen($ws, $request) {
        $ws->push($request->fd, "连接成功\n");
    }

    public function omMessage($ws, $frame){
        //解析出接收消息uid
        $message = json_decode($frame->data,true);
        $msg = isset($message['msg']) ? $message['msg'] : '';
        $to = isset($message['to']) ? $message['to'] : 0;
        $type = isset($message['type']) ? $message['type'] : 2;//1加入，2发消息
        echo "发消息: {$message['msg']}给".$message['to']."\n";
        if($type == 1){
            //加入

            $this->addLine($to,$frame->fd);
        } else {

        }
//        $ws->push($frame->fd, "server: {$frame->data}");//推送到发送者
    }

    public function omClose($ws, $fd){
        echo "客户端 {$fd} 已经退出！\n";
    }

    public function addLine($uid,$fd)
    {
//       \Service\Helper\Swoole::add();
    }
}

//监听WebSocket连接打开事件
//$ws->on('open', function ($ws, $request) {
//    var_dump($request->fd, $request->server);
//    $ws->push($request->fd, "hello, welcome\n");
//});

//监听WebSocket消息事件
//$this->ws->on('message', function ($ws, $frame) {
//    echo "Message: {$frame->data}\n";
//    $ws->push($frame->fd, "server: {$frame->data}");
//});

//监听WebSocket连接关闭事件
//$this->wss->on('close', function ($ws, $fd) {
//    echo "client-{$fd} is closed\n";
//});
//
//$this->ws->start();
new WebSocket();