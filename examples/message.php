<?php

require_once __DIR__ . '/vendor/autoload.php';

$client = new \ZeebeClient\GatewayClient('zeebe:26500', [
    'credentials' => \Grpc\ChannelCredentials::createInsecure(),
]);

$messageRequest = new \ZeebeClient\PublishMessageRequest([
    'name'           => 'order',
    'correlationKey' => 104,
    'timeToLive'     => 60,
    'variables'      => json_encode(['orderId' => 103]),
]);

$res = $client->PublishMessage($messageRequest)->wait();

var_dump($res);
