<?php

use backend\assets\AppAsset;
use yii\helpers\Html;
use yii\bootstrap\Nav;
use yii\bootstrap\NavBar;
use yii\widgets\Breadcrumbs;

/* @var $this \yii\web\View */
/* @var $content string */

AppAsset::register($this);
?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>">
    <head>
        <meta charset="<?= Yii::$app->charset ?>"/>
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <?= Html::csrfMetaTags() ?>
        <title><?= Html::encode($this->title) ?></title>
        <?php $this->head() ?>
    </head>
    <body>
        <?php $this->beginBody() ?>
        <div class="wrap">
            <?php
            NavBar::begin([
                'brandLabel' => 'TCIPHER',
                'brandUrl'   => Yii::$app->homeUrl,
                'options'    => [
                    'class' => 'navbar-inverse navbar-fixed-top',
                ],
            ]);
            $menuItems = [
                ['label' => '主页', 'url' => ['/site/index']],
            ];

            if (Yii::$app->user->isGuest)
            {
                $menuItems[] = ['label' => '登陆', 'url' => ['/site/login']];
            }
            else
            {
                $menuItems[] = ['label' => '公司信息', 'url' => ['info/index']];
                $menuItems[] = ['label' => '公司图片', 'url' => ['picture/index']];
                $menuItems[] = ['label' => '产品信息', 'url' => ['product/index']];
                $menuItems[] = ['label' => '产品类型', 'url' => ['product-type/index']];
                $menuItems[] = ['label' => '实时资讯', 'url' => ['article/index']];
                $menuItems[] = ['label' => '代理信息', 'url' => ['agency/index']];

                $menuItems[] = ['label' => '修改密码', 'url' => ['site/change-password']];
                $menuItems[] = [
                    'label'       => '注销 (' . Yii::$app->user->identity->username . ')',
                    'url'         => ['/site/logout'],
                    'linkOptions' => ['data-method' => 'post']
                ];
            }
            echo Nav::widget([
                'options' => ['class' => 'navbar-nav navbar-right'],
                'items'   => $menuItems,
            ]);
            NavBar::end();
            ?>

            <div class="container">
                <?=
                Breadcrumbs::widget([
                    'links' => isset($this->params['breadcrumbs']) ? $this->params['breadcrumbs'] : [],
                ])
                ?>
                <?= $content ?>
            </div>
        </div>

        <footer class="footer">
            <div class="container">
                <p class="pull-left">&copy; TCIPHER <?= date('Y') ?></p>
                <!--<p class="pull-right"><?php //echo Yii::powered() ?></p>-->
            </div>
        </footer>

        <?php $this->endBody() ?>
    </body>
</html>
<?php $this->endPage() ?>
