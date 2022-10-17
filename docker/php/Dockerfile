FROM php:fpm-alpine

RUN docker-php-ext-install opcache
COPY docker/php/prod/php.ini /usr/local/etc/php/conf.d/php.ini
COPY docker/php/prod/opcache.ini /usr/local/etc/php/conf.d/opcache.ini


# Install composer
ENV COMPOSER_HOME /root/composer
ENV COMPOSER_ALLOW_SUPERUSER 1
ENV COMPOSER_MEMORY_LIMIT=-1
COPY --from=composer /usr/bin/composer /usr/bin/composer

COPY ./app/ /var/www/html

RUN composer install