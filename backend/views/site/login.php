<?php
use yii\helpers\Url;
use backend\assets\LoginAsset;
use yii\helpers\Html;
LoginAsset::register($this);
?>
<div id="wrapper" class="login-page">
    <div id="login_form" class="form">
        <form class="login-form">
            <h2>管理登录</h2>
            <input type="text" placeholder="用户名" value="admin" id="user_name" />
            <input type="password" placeholder="密码" id="password" />
            <button id="login" style="background:#1E9FFF;">登　录</button>
        </form>
    </div>
</div>