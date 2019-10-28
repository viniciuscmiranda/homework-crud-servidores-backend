<?php
require __DIR__ . "/../../vendor/autoload.php";
use Source\Models\Sale;

$sale = new Sale();

$item = $sale->find("_id = :id", "id={$_GET["id"]}")->fetch();
header('Content-Type: application/json');

$products = $item->products();
$productsHolder = [];
foreach($products as $prod) array_push($productsHolder, $prod->data());
$item->products = $productsHolder;

echo json_encode($item->data(), JSON_UNESCAPED_SLASHES);
