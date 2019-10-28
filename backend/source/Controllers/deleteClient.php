<?php
require __DIR__ . "/../../vendor/autoload.php";
use Source\Models\Client;

$client = (new Client())->findById($_GET["id"]);
$client->destroy();