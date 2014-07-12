<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\models\Product */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="product-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'type')->textInput(['maxlength' => 32]) ?>

    <?= $form->field($model, 'name')->textInput(['maxlength' => 32]) ?>

    <?= $form->field($model, 'image')->textInput(['maxlength' => 255]) ?>
    
    <?= Html::activeHiddenInput($model, 'create_time', ['value' => date('Y-m-d H:i:s')]) ?>
    <?php // $form->field($model, 'create_time')->hiddenInput(['value' => date('Y-m-d H:i:s')]) ?>

    <?= Html::activeHiddenInput($model, 'update_time', ['value' => date('Y-m-d H:i:s')]) ?>
    <?php // $form->field($model, 'update_time')->hiddenInput(['value' => date('Y-m-d H:i:s')]) ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? '保存' : '修改', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
