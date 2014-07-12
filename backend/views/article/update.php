<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\Article */

$this->title = '修改美容讲堂: ' . ' ' . $model->title;
$this->params['breadcrumbs'][] = ['label' => '美容讲堂', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->title, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = '修改';
?>
<div class="article-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
