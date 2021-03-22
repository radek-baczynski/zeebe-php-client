<?php

require_once __DIR__ . '/vendor/autoload.php';

$client = new \ZeebeClient\GatewayClient('zeebe:26500', [
'credentials' => \Grpc\ChannelCredentials::createInsecure(),
]);

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


