<?php
require __DIR__ . "/../../vendor/autoload.php";
use Source\Models\Product;

$prod = (new Product())->findById($_GET["id"]);
$prod->destroy();