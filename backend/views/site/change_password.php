<?php
use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $form yii\widgets\ActiveForm */
/* @var $model \common\models\LoginForm */

$this->title = '修改密码';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="site-change-password">
    <h1><?= Html::encode($this->title) ?></h1>

    <!--<p>Please fill out the following fields to login:</p>-->

    <div class="row">
        <div class="col-lg-5">
            <?php $form = ActiveForm::begin(['id' => 'change-password-form']); ?>
                <?= $form->field($model, 'currentPassword')->passwordInput() ?>
                <?= $form->field($model, 'newPassword')->passwordInput() ?>
                <?= $form->field($model, 'newPasswordRepeat')->passwordInput() ?>
                <div class="form-group">
                    <?= Html::submitButton('修改', ['class' => 'btn btn-primary', 'name' => 'change-password-button']) ?>
                </div>
            <?php ActiveForm::end(); ?>
        </div>
    </div>
</div>
