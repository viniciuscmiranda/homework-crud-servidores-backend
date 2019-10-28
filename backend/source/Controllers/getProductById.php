<?php
require __DIR__ . "/../../vendor/autoload.php";
use Source\Models\Product;

$prod = new Product();

$item = $prod->find("_id = :id", "id={$_GET["id"]}")->fetch();
header('Content-Type: application/json');
echo json_encode($item->data(), JSON_UNESCAPED_SLASHES);
