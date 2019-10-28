<?php
require __DIR__ . "/../../vendor/autoload.php";
use Source\Models\Sale;

$sale = (new Sale())->findById($_GET["id"]);

foreach($sale->products() as $p) $p->destroy();
$sale->destroy();