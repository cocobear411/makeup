<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model common\models\Info */

$this->title = '新建公司信息';
$this->params['breadcrumbs'][] = ['label' => '公司信息', 'url' => ['index']];
$this->params['breadcrumbs'][] = '新建';
?>
<div class="info-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
