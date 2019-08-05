#!/usr/bin/env sh

php download_proto.php 0.20.0

protoc --php_out=/zeebe/src --grpc_out=/zeebe/src --plugin=protoc-gen-grpc=/usr/bin/grpc_php_plugin zeebe.proto
