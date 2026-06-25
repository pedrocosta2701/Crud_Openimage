FROM php:7.4-fpm

RUN apt-get update && apt-get install -y \
    libpng-dev \
    libjpeg-dev \
    libfreetype6-dev \
    libzip-dev \
    libxml2-dev \
    libxslt-dev \
    unzip \
    git \
    curl \
  && docker-php-ext-configure gd --with-freetype --with-jpeg \
  && docker-php-ext-install \
    gd \
    pdo_mysql \
    mysqli \
    zip \
    soap \
    xsl \
    bcmath \
    intl \
    opcache

RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer

WORKDIR /var/www/html
