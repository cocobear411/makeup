<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\models\search\InfoSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="info-search">

    <?php
    $form = ActiveForm::begin([
            'action' => ['index'],
            'method' => 'get',
    ]);
    ?>

    <?= $form->field($model, 'id') ?>

    <?= $form->field($model, 'tag') ?>

    <?= $form->field($model, 'value') ?>

    <?= $form->field($model, 'create_time') ?>

    <?= $form->field($model, 'update_time') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
