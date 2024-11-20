#!/bin/bash
if [ "$APP_ENV" = "production" ]; then
    cd /var/www/html
    chown -R www-data:www-data storage
    composer install --no-dev
    npm install
    npm run build
    php artisan key:generate
    php artisan optimize
fi
. /usr/local/bin/docker-php-entrypoint php-fpm