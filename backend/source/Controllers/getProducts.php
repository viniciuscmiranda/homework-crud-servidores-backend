<?php
require __DIR__ . "/../../vendor/autoload.php";
use Source\Models\Product;

$product = new Product();
$list = $product->find()->fetch(true);

header('Content-Type: application/json');

echo '[';

foreach($list as $prodItem){
    echo json_encode($prodItem->data(), JSON_UNESCAPED_SLASHES);
    if((array_search($prodItem, $list) < sizeof($list)-1)) echo ",";

}
echo ']';
