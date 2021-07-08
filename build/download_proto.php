<?php
$c = file_get_contents("https://raw.githubusercontent.com/camunda-cloud/zeebe/{$argv[1]}/gateway-protocol/src/main/proto/gateway.proto");
$c .= "\noption php_namespace = \"ZeebeClient\";";
$c .= "\noption php_metadata_namespace = \"ZeebeClient\";";

file_put_contents("zeebe.proto", $c);
