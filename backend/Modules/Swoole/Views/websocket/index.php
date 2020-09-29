<div>

    <input type="text" id="message_txt" value="">
    <button id="send_msg">发送</button>

</div>

<!-------------------------------------------资源文件------------------------------------------->
<!--引入javascript-->
<?php $this->registerJs($this->render("/javascript/WebSocket.js"),yii\web\View::POS_END); ?>
<!--引入css-->