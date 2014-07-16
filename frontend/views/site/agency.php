<?php

use yii\widgets\ActiveForm;
use yii\helpers\Html;
?>
<!--wrapper start -->
<div class="wrapper">
    <div class="login-panel">
        <h3>代理信息查询</h3>
        <div class="login-mod">
            <div id="err_area" class="login-err-panel dn">
                <span id="err_tips" class="vm"></span>
            </div>

            <form id="login-form" class="login-form" action="index.php?r=site/agecy">
            <?php // $form = ActiveForm::begin(['options'=>['id' => 'login-form', 'class' => 'login-form']]) ?>

            <div class="login-un">
                <span class="icon-wrapper">
                    <i class="icon_login un"></i>
                </span>
                <input id="account" type="text" placeholder="代理号"></input>
                <?php //  Html::textInput('code', '', ['id'=>'account', 'placeholder'=>"代理号"]) ?>
            </div>    
            <!--</form>-->

            <div class="login-btn-panel">
                <a id="login_button" class="login-btn" href="javascript:;" title="点击查询">查询</a>
            </div>
            <?php // ActiveForm::end(); ?>
        </div>
    </div>
</div>
<!--wrapper end -->