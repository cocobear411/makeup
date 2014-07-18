<?php

use yii\helpers\Html;
use yii\grid\GridView;
use common\models\search\ArticleSearch;
use common\models\Article;
?>

<?php if(empty($id)) : ?>
<div class="article-index">

    <?php
    $searchModel  = new ArticleSearch();
    $dataProvider = $searchModel->search(Yii::$app->request->queryParams);
    ?>

    <?=
    GridView::widget([
        'dataProvider' => $dataProvider,
        'columns'      => [
            [
                'class' => 'yii\grid\SerialColumn'
            ],
            [
                'attribute' => 'url',
                'label'     => '标题',
                'format' => 'html',
            ],
            [
                'attribute' => 'create_time',
                'label' => '创建时间',
                'format' => 'date',
            ]
        // 'update_time',
        ],
    ]);
    ?>

</div>
<?php else : ?>

<div class="article-content">
<?= Article::findOne($id)->content; ?>
</div>

<?php endif; ?>
