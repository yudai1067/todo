FROM php:8.2.25-fpm
COPY php.ini /usr/local/etc/php/
RUN apt-get update && apt-get install -y \
    unzip \
    vim
RUN docker-php-ext-install pdo_mysql
COPY composer-install.sh /usr/local/bin/
WORKDIR /usr/local/bin
RUN . /usr/local/bin/composer-install.sh
WORKDIR /var/www/html