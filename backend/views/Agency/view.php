<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

Yii::$app->request->setBaseUrl("../../upload");
$this->title                   = "";
$this->params['breadcrumbs'][] = ['label' => '代理信息', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="notice-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('更新代理', ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
        <?=
        Html::a('删除代理', ['delete', 'id' => $model->id], [
            'class' => 'btn btn-danger',
            'data'  => [
                'confirm' => '你确定要删除么?',
                'method'  => 'post',
            ],
        ])
        ?>
    </p>

    <?=
    DetailView::widget([
        'model'      => $model,
        'attributes' => [
            'id',
            'code',
            'image:image',
            'create_time',
            'update_time',
        ],
    ])
    ?>

</div>