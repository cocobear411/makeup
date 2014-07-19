<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model common\models\Info */

$this->title = $model->id;
$this->params['breadcrumbs'][] = ['label' => '公司信息', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="info-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('修改', ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
        <?php /* Html::a('删除', ['delete', 'id' => $model->id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => '确定删除?',
                'method' => 'post',
            ],
        ]) */?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id',
            'tag',
            'value',
            'create_time',
            'update_time',
        ],
    ]) ?>

</div>
