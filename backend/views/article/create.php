<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model common\models\Article */

$this->title = '新建美容讲堂';
$this->params['breadcrumbs'][] = ['label' => '美容讲堂', 'url' => ['index']];
$this->params['breadcrumbs'][] = '新建';
?>
<div class="article-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
