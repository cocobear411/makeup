<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel common\models\search\ProductTypeSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = '产品类型';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="product-type-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('新建产品类型', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
//        'layout' => "{items}\n{pager}",
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            'serial',
            'type',
            'create_time',
            'update_time',

            [
                'class'    => 'yii\grid\ActionColumn',
                'template' => '{view} {update} {delete}'
            ],
        ],
    ]); ?>

</div>
