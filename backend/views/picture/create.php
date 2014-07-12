<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model common\models\Picture */

$this->title = '新建公司图片';
$this->params['breadcrumbs'][] = ['label' => '公司图片', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="picture-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
