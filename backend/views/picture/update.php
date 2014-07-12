<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\Picture */

$this->title = '修改公司图片: ' . ' ' . $model->id;
$this->params['breadcrumbs'][] = ['label' => '公司图片', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = '修改';
?>
<div class="picture-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
