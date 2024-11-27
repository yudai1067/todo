FROM public.ecr.aws/docker/library/php:8.2.25-fpm
EXPOSE 5173
COPY ./docker/php-fpm//php.ini /usr/local/etc/php/
RUN apt-get update && apt-get install -y \
    unzip \
    vim \
    npm
RUN docker-php-ext-install pdo_mysql
COPY ./src /var/www/html
COPY ./docker/php-fpm/composer-install.sh /usr/local/bin/
WORKDIR /usr/local/bin
RUN . /usr/local/bin/composer-install.sh
WORKDIR /var/www/html
COPY ./docker/php-fpm/docker-entrypoint.sh /usr/local/bin/docker-entrypoint.sh
VOLUME ["/var/www/html/public"]
ENTRYPOINT ["/usr/local/bin/docker-entrypoint.sh"]