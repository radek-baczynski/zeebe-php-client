#!/usr/bin/env sh

php ./build/download_proto.php "$1"

rm -rf src/*
protoc --php_out=./src --grpc_out=./src --plugin=protoc-gen-grpc=/usr/bin/grpc_php_plugin zeebe.proto

echo "$1" > ./VERSION
