FROM php:8.2-fpm

RUN apt-get update && apt-get install -y \
    libpng-dev \
    libjpeg-dev \
    libfreetype6-dev \
    zip \
    unzip \
    netcat-openbsd \
    git \
    curl \
    libonig-dev \
    libxml2-dev \
    && docker-php-ext-install pdo_mysql mbstring exif pcntl bcmath gd

COPY --from=composer:2.8.10 /usr/bin/composer /usr/bin/composer

WORKDIR /var/www/afr-minilemontest-api

COPY . .

RUN composer install --no-dev --prefer-dist --optimize-autoloader

COPY entrypoint.sh /usr/local/bin/
RUN chmod +x /usr/local/bin/entrypoint.sh

ENTRYPOINT ["entrypoint.sh"]

EXPOSE 9000
CMD ["php-fpm"]
