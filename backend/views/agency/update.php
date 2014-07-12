<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\Agency */

$this->title = '修改代理信息: ' . ' ' . $model->id;
$this->params['breadcrumbs'][] = ['label' => '代理信息', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = '修改';
?>
<div class="agency-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
