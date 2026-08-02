FROM php:8.4-fpm

WORKDIR /var/www/laravel

RUN apt-get update \
    && apt-get install -y --no-install-recommends libonig-dev \
    && docker-php-ext-install mbstring pdo pdo_mysql \
    && rm -rf /var/lib/apt/lists/*