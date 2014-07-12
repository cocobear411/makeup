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
//        echo "ok";exit;
//        $model->image = "../../upload/" . $model->image;
        Yii::$app->request->setBaseUrl("../../upload");
        $imginfo = Html::img("{$model->image}", ['class' => 'file-preview-image', 'alt' => 'Images', 'title' => 'Images']);
    }
        
    echo $form->field($model, 'image')->widget(FileInput::classname(), [
        'options'       => ['accept' => 'image/*',],
        'pluginOptions' => [
            'initialPreview'   => isset($imginfo) ? $imginfo : "",
            'initialCaption'   => '你上传的图像',
            'showRemove'       => false,
            'showPreview'      => true,
            'showCaption'      => true,
            'showUpload'       => false,
            'overwriteInitial' => true,
        ],
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
