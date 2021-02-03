<?php

require_once __DIR__ . '/vendor/autoload.php';

/** @var \ZeebeClient\GatewayClient $client */
$client = require __DIR__ . '/get_client.php';

while (true) {
    $activeJobs = $client->ActivateJobs(new \ZeebeClient\ActivateJobsRequest([
        'type' => 'php_task',
        'worker' => 'php-worker',
        'maxJobsToActivate' => 1,
        'timeout' => 60,
    ]));

    /** @var \ZeebeClient\ActivateJobsResponse $response */
    foreach ($activeJobs->responses() as $response) {
        /** @var \ZeebeClient\ActivatedJob $job */
        foreach ($response->getJobs() as $job) {

            var_dump(["job received job: ", $job->getKey(), $job->getElementId()]);
            sleep(rand(1, 4));
            var_dump(["job processed"]);

            $completeRequest = new \ZeebeClient\CompleteJobRequest([
                'jobKey' => $job->getKey(),
            ]);
            $res = $client->CompleteJob($completeRequest)->wait();
            var_dump($res);
        }
    }

    echo "sleep...\n";
    sleep(1);
}
