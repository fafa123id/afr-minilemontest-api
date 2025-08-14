FROM php:8.2-fpm

RUN apt-get update && apt-get install -y \
    libpng-dev \
    libjpeg-dev \
    libfreetype6-dev \
    zip \
    unzip \
    git \
    curl \
    libonig-dev \
    libxml2-dev \
    && docker-php-ext-install pdo_mysql mbstring exif pcntl bcmath gd

COPY --from=composer:2 /usr/bin/composer /usr/bin/composer

WORKDIR /var/www/afr-minilemontest-api

COPY composer.json composer.lock ./

RUN composer install --no-dev --optimize-autoloader --no-scripts --no-interaction

COPY . .


RUN chown -R www-data:www-data /var/www/afr-minilemontest-api \
    && chmod -R 775 /var/www/afr-minilemontest-api/storage /var/www/afr-minilemontest-api/bootstrap/cache


EXPOSE 9000
CMD ["php-fpm"]
