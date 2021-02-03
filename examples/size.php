<?php

require_once __DIR__ . '/vendor/autoload.php';

/** @var \ZeebeClient\GatewayClient $client */
$client = require __DIR__.'/get_client.php';

/** @var $rsp \ZeebeClient\TopologyResponse */
[$rsp, $status] = $client->Topology(new \ZeebeClient\TopologyRequest)->wait();

echo "Cluster size is: {$rsp->getClusterSize()}";
