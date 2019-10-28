<?php
require __DIR__ . "/../../vendor/autoload.php";
use Source\Models\Sale;
use Source\Models\SaleProduct;

$data = json_decode(file_get_contents('php://input'), true);

$sale = (new Sale())->findById($data["id"]);

$sale->clientId = $data["clientId"];
$prods = $data["products"];

$sale->save();

$products = $sale->products();
foreach($products as $prod) $prod->destroy();

$productsHolder = [];
foreach($prods as $p){
    $saleprod = new SaleProduct();
    $saleprod->saleId = $sale->_id;
    $saleprod->productId = $p["productId"];
    $saleprod->price = $p["price"];
    $saleprod->amount = $p["amount"];
    $saleprod->save();

    array_push($productsHolder, $saleprod->data());
}

$sale->products = $productsHolder;

echo json_encode($sale->data(), JSON_UNESCAPED_SLASHES);
