#!/usr/bin/env sh

php download_proto.php "$1"

rm -rf src/*
protoc --php_out=/zeebe/src --grpc_out=/zeebe/src --plugin=protoc-gen-grpc=/usr/bin/grpc_php_plugin zeebe.proto

echo "$1" > /zeebe/VERSION
