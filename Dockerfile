FROM php:8-apache

RUN apt-get update && apt-get install -y \
    curl \
    wget

RUN docker-php-ext-install \
    pdo_mysql

## Copy config files
ADD ./docker-php-ext-xdebug.ini /usr/local/etc/php/conf.d/docker-php-ext-xdebug.ini

## Instal xdebug
RUN yes | pecl install xdebug-3.3.0 \
    && docker-php-ext-enable xdebug

RUN echo "8-apache completed!"

## Set workdir
WORKDIR /var/www/html
