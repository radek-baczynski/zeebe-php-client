<?php

require_once __DIR__ . '/vendor/autoload.php';

$client = new \ZeebeClient\GatewayClient('zeebe:26500', [
    'credentials' => \Grpc\ChannelCredentials::createInsecure(),
]);

/** @var $rsp \ZeebeClient\TopologyResponse */
[$rsp, $stauts] = $client->Topology(new \ZeebeClient\TopologyRequest)->wait();

echo "Cluster size is: {$rsp->getClusterSize()}";
