# Imedia assessment

Prerequisite:

Docker installed
cp .env.example to .env


Set up instructions:

Onced project has been cloned.

1. Run docker-compose up -d
2. Once all containers are up run docker-compose exec php-fpm bash
3. Once in the fpm container run php artisan migrate:fresh
4. Once db has been migrated run php artisan queue:work --tries=2

Thereafter you can naivgate to / and search for places.
