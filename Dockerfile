FROM php:7.3-fpm

WORKDIR /var/www

COPY ./ /var/www
RUN ls -al /var/www

RUN chown -R www-data:www-data \
        /var/www/storage \
        /var/www/bootstrap/cache

RUN mkdir -p /tmp/storage/bootstrap/cache \
    && chmod 777 -R /tmp/storage/bootstrap/cache

RUN mv "$PHP_INI_DIR/php.ini-production" "$PHP_INI_DIR/php.ini"
