<?php

require_once __DIR__ . '/vendor/autoload.php';

$client = require __DIR__ . '/get_client.php';

$client->waitForReady(100);

$workflow = new ZeebeClient\WorkflowRequestObject([
    'name' => 'order.bpmn',
    'type' => \ZeebeClient\WorkflowRequestObject\ResourceType::value('bpmn'),
    'definition' => file_get_contents(__DIR__.'/order.bpmn')
]);

$deployRequest = new \ZeebeClient\DeployWorkflowRequest([
    'workflows' => [$workflow]
]);

[$rsp, $status] = $client->DeployWorkflow($deployRequest)->wait();

var_dump($rsp, $status);


