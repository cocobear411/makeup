<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel common\models\search\AgencySearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title                   = '代理信息';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="agency-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('新建代理信息', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?=
    GridView::widget([
//        'layout' => "{items}\n{pager}",
        'dataProvider' => $dataProvider,
        'filterModel'  => $searchModel,
        'columns'      => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            'code',
            'image',
            'create_time',
            'update_time',
            [
                'class'    => 'yii\grid\ActionColumn',
                'template' => '{view} {update} {delete}'
            ],
        ],
    ]);
    ?>

</div>
