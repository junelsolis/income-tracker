FROM php:7.2.10-fpm

RUN apt-get update -y && apt-get install -y openssl zip unzip git
RUN docker-php-ext-install pdo mbstring
