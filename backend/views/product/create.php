<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model common\models\Product */

$this->title = '新建产品信息';
$this->params['breadcrumbs'][] = ['label' => '产品信息', 'url' => ['index']];
$this->params['breadcrumbs'][] = '新建';
?>
<div class="product-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
