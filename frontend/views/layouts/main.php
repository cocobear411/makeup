<?php

use yii\helpers\Html;
use yii\bootstrap\Nav;
use yii\bootstrap\NavBar;
use yii\widgets\Breadcrumbs;
use frontend\assets\AppAsset;
use frontend\widgets\Alert;
use common\models\Picture;
use common\models\ProductType;
use common\models\Info;

/* @var $this \yii\web\View */
/* @var $content string */
$basePath     = '../../upload/';
AppAsset::register($this);
?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>">
    <head>
        <meta charset="<?= Yii::$app->charset ?>"/>
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <?php //Html::csrfMetaTags() ?>
        <!--<title><?php // Html::encode($this->title)      ?></title>-->
        <?php $this->head() ?>
    </head>
    <body>
        <?php $this->beginBody() ?>

        <!--header start -->
        <div class="header">
            <div class="header_l left">
                <img src="<?= $basePath . Picture::findOne(['tag' => '上左'])->image ?>" width="270" height="180">
            </div>
            <div class="header_r right">
                <div class="qq_talk">
                    <?php  $info = Info::findOne(['tag' => '客服QQ']); echo isset($info) ? htmlspecialchars_decode($info->value) : ""; ?>
                </div>

                <div class="phone">
                    <?php $info = Info::findOne(['tag' => '公司电话']); echo isset($info) ? '公司电话：'.$info->value : ""; ?>
                </div>



<!--<img src="<? $basePath . Picture::findOne(['tag' => '上右'])->image ?>" width="270" height="180">-->
            </div>
        </div>
        <!--header end -->

        <!--nav start -->
        <div class="nav">
            <ul>
                <li><a href="index.php?r=site/index">品牌首页</a></li>
                <li><a href="" onmouseover="showMenu('hiddenDiv', 'over');" onmouseout="showMenu('hiddenDiv', 'out');">产品介绍</a>

                    <!-- hiddenDiv start -->
                    <div class="hiddenDiv" id="hiddenDiv" onmouseover="showMenu('hiddenDiv', 'over');" onmouseout="showMenu('hiddenDiv', 'out');">
                        <ul>
                            <?php
                            $productTypes = ProductType::find()->orderBy('serial')->all();
                            foreach ($productTypes as $productType) :
                                ?>
                                <li><a href="<?php echo "index.php?r=site/product&type={$productType->type}" ?>"><?php echo $productType->type; ?></a></li>
                            <?php endforeach ?>
                        </ul>
                    </div> 
                    <!-- hiddenDiv end -->

                </li> 
                <li><a href="index.php?r=site/article">美容讲堂</a></li>
                <li><a href="index.php?r=site/agency">代理查询</a></li>
                <li><a href="index.php?r=site/company">公司介绍</a></li>

            </ul>
        </div>
        <!--nav end -->

        <?= $content ?>

        <!--footer start -->
        <div class="footer">
            <!--        <a href="">客户服务</a>
                    <a href="">在线客服</a>
                    <a href="">常见问题</a>
                    <a href="">联系我们</a>
                    <a href="">网站地图</a>
                    <a href="">隐私条款</a>
                    <a href="">条款条件</a>-->
            <span class="copyright">Copyright &copy;2014-2015 TCIPHER, All Rights Reserved.</span>
        </div>
        <!--footer end -->

        <?php $this->endBody() ?>
    </body>
</html>
<?php $this->endPage() ?>