<?php

use yii\widgets\ActiveForm;
use yii\helpers\Html;

$basePath = "../../upload/";
?>
<!--wrapper start -->
<div class="wrapper">
    <div class="login-panel">
        <h3>代理信息查询</h3>
        <div class="login-mod">
            <div id="err_area" class="login-err-panel dn">
                <span id="err_tips" class="vm"></span>
            </div>

            <?php $form     = ActiveForm::begin(['options' => ['id' => 'login-form', 'class' => 'login-form']]) ?>

            <div class="login-un">
                <span class="icon-wrapper">
                    <i class="icon_login un"></i>
                </span>
                <?php echo Html::textInput('code', '', ['id' => 'account', 'placeholder' => "代理号"]) ?>
            </div>    
            <!--</form>-->

            <div class="login-btn-panel">
                <?php echo Html::submitButton('查询', ['id' => "login_button", 'class' => "login-btn"]); ?>
            </div>
            <?php ActiveForm::end(); ?>
        </div>
    </div>
    <?php
    if (empty($image)) :
    ?>
    <?php else : ?>
        <img src="<?= $basePath . $image; ?>">
    <?php endif ?>
</div>
<!--wrapper end -->