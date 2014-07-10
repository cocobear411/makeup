<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use kartik\widgets\FileInput;
use yii\web\JsExpression;
use common\models\Agency;
?>

<div class="Agency-form">

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

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? '创建' : '更新', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
