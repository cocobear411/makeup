<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use bamboo\ueditor\Ueditor;

/* @var $this yii\web\View */
/* @var $model common\models\Info */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="info-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'tag')->textInput(['maxlength' => 255]) ?>

    <?php
//    echo $form->field($model, 'value')->textInput(['maxlength' => 255]);
    echo $form->field($model, 'value')->widget(Ueditor::classname(), [
        'options' => [
            'style'              => "height:500px;",
        ],
        '_editor_id' => 'info-value',
    ]);
    
    ?>

    <?= Html::activeHiddenInput($model, 'create_time', ['value' => date('Y-m-d H:i:s')]) ?>
    <?php // $form->field($model, 'create_time')->hiddenInput(['value' => date('Y-m-d H:i:s')]) ?>

    <?= Html::activeHiddenInput($model, 'update_time', ['value' => date('Y-m-d H:i:s')]) ?>
    <?php // $form->field($model, 'update_time')->hiddenInput(['value' => date('Y-m-d H:i:s')]) ?>
    
    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? '保存' : '修改', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
