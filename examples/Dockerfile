FROM php:8-buster

RUN apt-get update && apt-get install -y zlib1g-dev

#RUN pecl install grpc-1.23.0RC1 && docker-php-ext-enable grpc
RUN pecl install grpc && docker-php-ext-enable grpc
#RUN pecl install protobuf && docker-php-ext-enable protobuf
RUN pecl install xdebug && docker-php-ext-enable xdebug

RUN curl -sS https://getcomposer.org/installer | \
    php -- --install-dir=/usr/local/bin --filename=composer

COPY entrypoint.sh /entrypoint.sh
RUN chmod +x /entrypoint.sh

WORKDIR /app