<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model common\models\Agency */

$this->title = '新建代理信息';
$this->params['breadcrumbs'][] = ['label' => '代理信息', 'url' => ['index']];
$this->params['breadcrumbs'][] = '新建';
?>
<div class="agency-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
