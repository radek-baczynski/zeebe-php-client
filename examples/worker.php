<?php

require_once __DIR__ . '/vendor/autoload.php';

/** @var \ZeebeClient\GatewayClient $client */
$client = require __DIR__ . '/get_client.php';

while (true) {
    $activeJobs = $client->ActivateJobs(new \ZeebeClient\ActivateJobsRequest([
        'type' => 'handler',
        'worker' => 'php-worker',
        'maxJobsToActivate' => 1,
        'timeout' => 60,
    ]));

    /** @var \ZeebeClient\ActivateJobsResponse $response */
    foreach ($activeJobs->responses() as $response) {
        /** @var \ZeebeClient\ActivatedJob $job */
        foreach ($response->getJobs() as $job) {

            var_dump(["job received job: ", $job->getKey(), $job->getElementId(), $job->getVariables()]);
            sleep(rand(0, 2));

            $completeRequest = new \ZeebeClient\CompleteJobRequest([
                'jobKey' => $job->getKey(),
                'variables' => $job->getElementId() == 'for_record_in_records' ? json_encode(['records' => [1, 2, 3]]) : '{}',
            ]);
            [$res, $status] = $client->CompleteJob($completeRequest)->wait();
            var_dump($status);
        }
    }

    echo "sleep...\n";
    sleep(1);
}
