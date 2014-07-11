<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\grid\ActionColumn;

/* @var $this yii\web\View */
Yii::$app->request->setBaseUrl("../../upload");
$this->title                   = '代理信息';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="agency-index">
    <h1><?= Html::encode($this->title) ?></h1>

    <p><?= Html::a('新建代理', ['create'], ['class' => 'btn btn-success']) ?></p>


    <?=
    GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel'  => $searchModel,
        'columns'      => [
            [
                'class'  => 'yii\grid\SerialColumn',
                'header' => "序号"
            ],
            'id',
            'code',
//                [
//                    'attribute' => 'image',
//                    'format'    => 'image',
//                    'label'     => '图片',
//                ],
            'image',
            'create_time',
            'update_time',
            [
                'class'  => 'yii\grid\ActionColumn',
                'header' => "操作",
            ],
        ],
    ]);
    ?>


</div>