## 🐳 Start the environment

```bash id="4m8qz1"
docker-compose build --no-cache
docker-compose up -d

php artisan optimize
php artisan optimize:clear
php artisan cache:clear
php artisan event:cache

php artisan l5-swagger:generate

```
