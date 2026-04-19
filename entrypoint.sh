#!/bin/sh

php artisan l5-swagger:generate

echo "⏳ Waiting for MySQL..."

while ! nc -z db 3306; do
  sleep 1
done

echo "✅ MySQL is ready!"

php artisan migrate --force

php artisan serve --host=0.0.0.0 --port=8000