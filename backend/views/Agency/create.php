<?php

use yii\helpers\Html;

/**
 * @var yii\web\View $this
 * @var common\models\Notice $model
 */

$this->title = '新建代理';
$this->params['breadcrumbs'][] = ['label' => '代理信息', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="notice-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>