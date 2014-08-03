<?php

use yii\helpers\Html;
use yii\grid\GridView;
use common\models\search\ArticleSearch;
use common\models\Article;
use yii\data\ArrayDataProvider;
?>

<?php if(empty($id)) : ?>
<div class="article-index">

    <?php
    $query = Article::find()->asArray()->all();
    $dataProvider = new ArrayDataProvider([
        'allModels' => $query,
    ]);

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
    <?php  $article = Article::findOne($id); ?>
    
    <div class="ar_title">
        <?= $article->title; ?>
    </div>
    
    <div class="ar_time">
        <?php
        $create_time = $article->create_time;
        echo substr($create_time, 0, 10);
        ?>
    </div>
    
    <div>
        <?= $article->content; ?>
    </div>
</div>

<?php endif; ?>
