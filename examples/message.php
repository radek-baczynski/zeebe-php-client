<?php

require_once __DIR__ . '/vendor/autoload.php';

$client = require __DIR__ . '/get_client.php';

$messageRequest = new \ZeebeClient\PublishMessageRequest([
    'name'           => 'order',
    'timeToLive'     => 60,
    'correlationKey' => 103,
    'variables'      => json_encode(['message' => 'Paid']),
]);

$res = $client->PublishMessage($messageRequest)->wait();

var_dump($res);
