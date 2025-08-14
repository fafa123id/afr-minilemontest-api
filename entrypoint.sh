#!/bin/sh
set -e

echo "Waiting for database to be ready..."
until nc -z -v -w30 db 3306
do
  echo "Database is not ready yet. Retrying in 5 seconds..."
  sleep 5
done
echo "Database is ready!"

if [ ! -f ".env" ]; then
    cp .env.example .env
fi

php artisan key:generate
php artisan config:clear
php artisan cache:clear
php artisan view:clear
php artisan migrate --force

echo "Generating Swagger documentation..."
php artisan l5-swagger:generate

chown -R www-data:www-data storage bootstrap/cache
chmod -R 775 storage bootstrap/cache

echo "Laravel setup is complete. Starting PHP-FPM..."

exec "$@"