set -e

echo "=== COPYING .env  ==="
cp ./src/.env.example ./src/.env
echo "=== COPYING .env IS DONE!  ==="

echo "=== BUILDING DOCKER CONTAINERS ==="
docker-compose up --build -d
echo "=== BUILDING DOCKER CONTAINERS IS DONE   ==="

echo "=== INSTALLING COMPOSER DEPENDENCIES ==="
docker-compose run --rm composer install
echo "=== INSTALLING COMPOSER DEPENDENCIES IS DONE ==="

echo "==== GENERATING LARAVEL APP KEY ==="
docker-compose run --rm artisan key:generate
echo "==== GENERATING LARAVEL APP KEY IS DONE! ==="

echo "==== RUNNING UNIT TESTS ==="
docker-compose run --rm php vendor/bin/phpunit
echo "==== RUNNING UNIT TESTS IS DONE! ==="