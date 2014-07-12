<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model common\models\ProductType */

$this->title = '新建产品类型';
$this->params['breadcrumbs'][] = ['label' => '产品类型', 'url' => ['index']];
$this->params['breadcrumbs'][] = '新建';
?>
<div class="product-type-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
