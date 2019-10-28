<?php
require __DIR__ . "/../../vendor/autoload.php";
use Source\Models\Client;

$client = new Client();
$list = $client->find()->fetch(true);

header('Content-Type: application/json');

echo '[';
foreach($list as $clientItem){
    echo json_encode($clientItem->data(), JSON_UNESCAPED_SLASHES);
    if((array_search($clientItem, $list) < sizeof($list)-1)) echo ",";
}
echo ']';