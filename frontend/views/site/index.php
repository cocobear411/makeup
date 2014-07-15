<?php
$basePath = '../../upload/';
?>

<div class="header">
    <div class="header_l left">
        <img src="<?= $basePath . $picture['upLeft']->image ?>" width="470" height="97">
    </div>
    <div class="header_r right">
        <img src="<?= $basePath . $picture['upRight']->image ?>" width="295" height="97">
    </div>
</div>

<!--header end -->
<div class="nav">
    <ul>
        <li><a href="">品牌首页</a></li>
        <li><a href="index.php?r=site/product">产品介绍</a></li>
        <li><a href="index.php?r=site/article">美容讲堂</a></li>
        <li><a href="index.php?r=site/agency">代理查询</a></li>
        <li><a href="index.php?r=site/company">公司简介</a></li>
    </ul>
</div><!--nav end -->

<div class="in_focus"><img src="<?= $basePath . $picture['middle']->image ?>" width="980" height="440"></div><!--in_focus end -->
<div class="in_picwrap">
    <div class="in_picwrap_l left"><img src="<?= $basePath . $picture['downLeft']->image ?>" width="322" height="150"></div>
    <div class="in_picwrap_c left"><img src="<?= $basePath . $picture['downMiddel']->image ?>" width="322" height="150"></div>
    <div class="in_picwrap_r right"><img src="<?= $basePath . $picture['downRight']->image ?>" width="322" height="150"></div>
    <image src="./image/footerbg.png">
</div><!--in_picwrap end -->

<div class="footer">
    <a href="http://www.eceiro.com/index.html#">客户服务</a>
    <a href="http://www.eceiro.com/index.html#">在线客服</a>
    <a href="http://www.eceiro.com/index.html#">常见问题</a>
    <a href="http://www.eceiro.com/index.html#">联系我们</a>
    <a href="http://www.eceiro.com/index.html#">网站地图</a>
    <a href="http://www.eceiro.com/index.html#">隐私条款</a>
    <a href="http://www.eceiro.com/index.html#">条款条件</a>
</div>
<!--footer end -->