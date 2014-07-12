<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use kartik\widgets\FileInput;

/* @var $this yii\web\View */
/* @var $model common\models\Agency */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="agency-form">

    <?php $form = ActiveForm::begin([ 'options' => [ 'enctype' => 'multipart/form-data']]); ?>

    <?= $form->field($model, 'code')->textInput(['maxlength' => 32]) ?>

    <?php
    if (!empty($model->image))
    {
        $model->image = "../../upload/" . $model->image;
        $imginfo = Html::img("{$model->image}", ['class'=>'file-preview-image', 'alt'=>'Images', 'title'=>'Images']); 
    }

    echo $form->field($model, 'image')->widget(FileInput::classname(), [
        'options'       => ['accept' => 'image/*'],
        'pluginOptions' => [
            'initialPreview' => isset($imginfo) ? $imginfo : "",
            'initialCaption' => "你上传的图像"
        ],
    ]);
    ?>

    <?= $form->field($model, 'create_time')->textInput() ?>

    <?= $form->field($model, 'update_time')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
