<?php
require __DIR__ . "/../../vendor/autoload.php";
use Source\Models\Product;

$prod = new Product();
$data = json_decode(file_get_contents('php://input'), true);

$prod->name = $data["name"];
$prod->picture = $data["picture"];
$prod->price = $data["price"];
$prod->multiple = $data["multiple"];
$prod->save();

echo json_encode($prod->data(), JSON_UNESCAPED_SLASHES);
