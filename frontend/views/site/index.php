<?php
$basePath = '../../upload/';
?>

<div class="in_focus">
    <img src="<?= $basePath . $picture['middle']->image ?>" width="980" height="588">
</div>
<!--in_focus end -->

<div class="in_picwrap">
    <div class="in_picwrap_l left">
        <img src="<?= $basePath . $picture['downLeft']->image ?>" width="322" height="150">
    </div>
    <div class="in_picwrap_c left">
        <img src="<?= $basePath . $picture['downMiddel']->image ?>" width="322" height="150">
    </div>
    <div class="in_picwrap_r right">
        <img src="<?= $basePath . $picture['downRight']->image ?>" width="322" height="150">
    </div>
    <!--<image src="./image/footerbg.png">-->
</div>
<!--in_picwrap end -->