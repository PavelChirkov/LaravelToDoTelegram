FROM php:8.2.1-fpm

RUN apt-get -y update && apt-get upgrade -y
RUN docker-php-ext-install pdo pdo_mysql && docker-php-ext-enable pdo_mysql

RUN pecl install xdebug-3.2.0 && docker-php-ext-enable xdebug

RUN apt-get install -y \
        libzip-dev \
        zip \
  && docker-php-ext-install zip


RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer

COPY docker/php/conf.d/* $PHP_INI_DIR/conf.d/

RUN apt-get clean
RUN apt-get update && apt-get install -y \
        zlib1g-dev libicu-dev g++ \
        libjpeg62-turbo-dev \
        libzip-dev \
        libpng-dev \
        libwebp-dev \
        libfreetype6-dev \
    	libxml2-dev \
    	git \
    	zip \
    	unzip \
    && docker-php-ext-install pdo_mysql \
    && docker-php-ext-configure gd --with-webp=/usr/include/webp --with-jpeg=/usr/include --with-freetype=/usr/include/freetype2/ \
    && docker-php-ext-install -j$(nproc) gd \
    && docker-php-ext-install -j$(nproc) zip \
    && docker-php-ext-configure intl \
    && docker-php-ext-install intl

RUN rm -rf /var/cache/apk/*


CMD ["php-fpm"]