FROM alpine:edge

RUN apk add protobuf protobuf-dev grpc php7 php7-openssl php7-mbstring php7-json php7-phar curl git

RUN curl -sS https://getcomposer.org/installer | \
    php -- --install-dir=/usr/local/bin --filename=composer

RUN composer global require "protobuf-php/protobuf-plugin" --prefer-dist

