FROM php:7.4-fpm-alpine3.12 as php

RUN apk add --no-cache \
    $PHPIZE_DEPS \
    shadow \
    zip \
    zlib-dev \
    libzip-dev \
    tzdata

RUN cp /usr/share/zoneinfo/Asia/Taipei /etc/localtime

RUN docker-php-ext-install zip pdo pdo_mysql opcache

WORKDIR /var/www/app/

COPY ./ /var/www/app
COPY ./docker-entrypoint.sh /sbin/docker-entrypoint.sh
COPY ./php.ini /usr/local/etc/php/conf.d/php-docker.ini
COPY ./php-fpm.ini /usr/local/etc/php-fpm.d/php-docker.conf

RUN chmod 700 /sbin/docker-entrypoint.sh

ENTRYPOINT ["/sbin/docker-entrypoint.sh"]
