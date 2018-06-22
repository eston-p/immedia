# Imedia assessment

Prerequisite:

1.Docker installed

2.cp src/immedia/.env.example to src/immedia.env


#Set up instructions:

Once project has been cloned.

1. Run docker-compose up -d

Once all containers are up

2. Run docker-compose exec php-fpm bash

Once in the fpm container

3. Run composer install
4. Run php artisan migrate:fresh

Once db has been migrated

5. Run php artisan queue:work --tries=2

Thereafter you can naivgate to / and search for places.
