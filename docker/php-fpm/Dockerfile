FROM php:7.3-fpm-alpine

RUN php -r "readfile('http://getcomposer.org/installer');" | php -- --install-dir=/usr/bin/ --filename=composer

RUN apk update && apk add freetype-dev libpng libpng-dev libjpeg-turbo-dev libwebp-dev zlib-dev libxpm-dev libzip-dev \
    && docker-php-ext-configure gd --with-freetype-dir=/usr/include/ --with-jpeg-dir=/usr/include/ --with-png-dir=/usr/include/ \
    && docker-php-ext-install gd pdo_mysql bcmath zip \
    && docker-php-ext-enable opcache 


COPY php.ini /usr/local/etc/php/conf.d/99-php.ini
