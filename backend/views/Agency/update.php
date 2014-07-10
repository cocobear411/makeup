<?php

use yii\helpers\Html;

/**
 * @var yii\web\View $this
 * @var common\models\Notice $model
 */

$this->title = '更新代理';
$this->params['breadcrumbs'][] = ['label' => '代理信息', 'url' => ['index']];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="notice-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
