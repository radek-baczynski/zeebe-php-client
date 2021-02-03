<?php

use Symfony\Component\Dotenv\Dotenv;

require_once __DIR__ . '/vendor/autoload.php';

$dotenv = new Dotenv();
$dotenv->load(__DIR__.'/.env');

$json = ['audience' => 'zeebe.camunda.io',
    'client_id' => $_ENV['ZEEBE_CLIENT_ID'],
    'client_secret' => $_ENV['ZEEBE_CLIENT_SECRET'],
    'grant_type' => 'client_credentials',
];

$authServer = $_ENV['ZEEBE_AUTHORIZATION_SERVER_URL'];

$token = \Symfony\Component\HttpClient\HttpClient::create()->request('POST', $authServer, ['json' => $json]);
$token = $token->toArray()['access_token'];

$address = $_ENV['ZEEBE_ADDRESS'];

$client = new \ZeebeClient\GatewayClient($address, [
    'credentials' => \Grpc\ChannelCredentials::createSsl(),
    'update_metadata' => function ($metaData) use ($token) {
        $metaData['authorization'] = ['Bearer ' . $token];
        return $metaData;
    }
]);

return $client;