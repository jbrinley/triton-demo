#!/bin/bash


REPODIR=$( cd "$( dirname "${BASH_SOURCE[0]}" )" && cd ../.. && pwd )

cd "$REPODIR"

docker build --file="dev/docker/php.Dockerfile" -t "jbrinley/triton-demo-php:latest" .
docker build --file="dev/docker/nginx.Dockerfile" -t "jbrinley/triton-demo-nginx:latest" .
