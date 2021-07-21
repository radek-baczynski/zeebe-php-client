<?php

require_once __DIR__ . '/vendor/autoload.php';

/** @var \ZeebeClient\GatewayClient $client */
$client = require __DIR__ . '/get_client.php';

$client->waitForReady(100);

$request = new \ZeebeClient\CreateWorkflowInstanceRequest([
//    'workflowKey' => '2251799813685249',
    'version' => -1,
    'bpmnProcessId' => 'story-xyz',
    'variables' => json_encode(['debug' => true, 'instance_id' => '121'])
]);

[$rsp, $status] = $client->CreateWorkflowInstance($request)->wait();

var_dump($rsp, $status);


