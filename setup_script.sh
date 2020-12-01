# copy files around
cp /etc/secret-volume/.env /var/www/.env
cp -r /var/www/public /tmp/www

# install sql drivers
docker-php-ext-install mysqli pdo pdo_mysql

# setup database
php artisan migrate -n
