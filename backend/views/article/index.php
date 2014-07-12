<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel common\models\search\ArticleSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = '美容讲堂';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="article-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('新建美容讲堂', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
//        'layout' => "{items}\n{pager}",
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            'title',
            'content:ntext',
            'create_time',
            'update_time',

            [
                'class'    => 'yii\grid\ActionColumn',
                'template' => '{view} {update} {delete}'
            ],
        ],
    ]); ?>

</div>
