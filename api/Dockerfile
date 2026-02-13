FROM php:8.4-fpm-alpine

RUN apk add --no-cache bash git unzip libzip-dev
RUN docker-php-ext-install zip

WORKDIR /var/www/html
COPY composer.json composer.lock ./

COPY . .
RUN php -r "copy('https://getcomposer.org/installer', 'composer-setup.php');" \
    && php composer-setup.php --install-dir=/usr/local/bin --filename=composer \
    && php -r "unlink('composer-setup.php');" \
    && composer install --no-dev --optimize-autoloader


EXPOSE 8000
CMD ["php", "-S", "0.0.0.0:8000", "-t", "public"]

