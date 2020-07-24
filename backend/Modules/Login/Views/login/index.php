<?php
use yii\helpers\Url;
use backend\assets\LoginAsset;
use yii\helpers\Html;
LoginAsset::register($this);
?>
<div id="wrapper" class="login-page">
    <div id="login_form" class="form">
        <?php $form = \yii\bootstrap\ActiveForm::begin(['id' => 'login','action' => '/Login/login/login']); ?>
            <h2>管理登录</h2>
<!--            <input type="text" placeholder="用户名" value="admin" name="username" />-->
<!--            <input type="password" placeholder="密码" id="password" name="password"/>-->

        <?= $form->field($model, 'username', [
            'template' => '{input}<span class="fa fa-user form-control-feedback"></span>{error}',
            'errorOptions' => ['tag' => 'span','class' => 'help-block redcolor error-tips'],
            'options' => ['class' => "form-group has-feedback "],
        ])->input('username', ['placeholder' => '账号']);
        ?>
        <?= $form->field($model, 'password', [
            'template' => '{input}<span class="glyphicon glyphicon-lock form-control-feedback"></span>{error}',
            'errorOptions' => ['tag' => 'span','class' => 'help-block redcolor error-tips'],
            'options' => ['class' => "form-group has-feedback "],
        ])->input('password', ['placeholder' => '密码']);
        ?>
        <span class="help-block redcolor error-tips"></span>
            <?php echo yii\helpers\Html::submitButton('登录',['class'=>'btn btn-block bg-purple btn-lg','style'=>'background:#1E9FFF;'])?>
        <?php \yii\bootstrap\ActiveForm::end(); ?>
    </div>
</div>