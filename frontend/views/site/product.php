<?php
$basePath = "../../upload/";
foreach ($products as $product) :
?>
    <div class="in_picwrap">
        <h2><?= $product->name ?></h2>
        <img src="<?= $basePath . $product->image ?>">
    </div>
<?php endforeach; ?>