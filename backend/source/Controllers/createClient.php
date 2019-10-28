<?php
require __DIR__ . "/../../vendor/autoload.php";
use Source\Models\Client;

$client = new Client();
$data = json_decode(file_get_contents('php://input'), true);

$client->name = $data["name"];
$client->picture = $data["picture"];
$client->save();

echo json_encode($client->data(), JSON_UNESCAPED_SLASHES);
