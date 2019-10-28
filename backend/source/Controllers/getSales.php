<?php
require __DIR__ . "/../../vendor/autoload.php";
use Source\Models\Sale;

$sale = new Sale();
$list = $sale->find()->fetch(true);

header('Content-Type: application/json');

echo '[';
foreach($list as $saleItem){
    $products = $saleItem->products();
    $productsHolder = [];


    //if($products!= null){
        foreach($products as $prod) {
            array_push($productsHolder, $prod->data());
        }
    //}

    $saleItem->products = $productsHolder;

    echo json_encode($saleItem->data(), JSON_UNESCAPED_SLASHES);
    if((array_search($saleItem, $list) < sizeof($list)-1)) echo ",";

}
echo ']';
