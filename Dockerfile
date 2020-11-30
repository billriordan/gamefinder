FROM composer:1.6.5 as composer
 
# Copy composer files from project root into composer container's working dir
COPY composer.* /app/
 
# Run composer to build dependencies in vendor folder
RUN set -xe \
    && composer install --no-dev --no-scripts --no-suggest --no-interaction --prefer-dist --optimize-autoloader
 
# Copy everything from project root into composer container's working dir
COPY . /app
 
# Generated optimized autoload files containing all classes from vendor folder and project itself
RUN composer dump-autoload --no-dev --optimize --classmap-authoritative

FROM php:7.1.8-apache
EXPOSE 80
COPY --from=build /app /app
COPY vhost.conf /etc/apache2/sites-available/000-default.conf
RUN chown -R www-data:www-data /app a2enmod rewrite
