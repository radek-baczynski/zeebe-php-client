<?php

require_once __DIR__ . '/vendor/autoload.php';

$client = require __DIR__ . '/get_client.php';

$messageRequest = new \ZeebeClient\PublishMessageRequest([
    'name'           => 'debug_next_step',
    'timeToLive'     => 60,
    'correlationKey' => "121",
    'variables'      => json_encode(['message' => 'Paid']),
]);

$res = $client->PublishMessage($messageRequest)->wait();

var_dump($res);
