<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\Info */

$this->title = '修改公司信息: ' . ' ' . $model->id;
$this->params['breadcrumbs'][] = ['label' => '公司信息', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->tag, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = '修改';
?>
<div class="info-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
