# Imedia assessment

Prerequisite:

1.Docker installed

2.cp src/immedia/.env.example to src/immedia.env


#Set up instructions:

Once project has been cloned.

1. Run docker-compose up -d
2. Once all containers are up, run docker-compose exec php-fpm bash
3. Once in the fpm container, run php artisan migrate:fresh
4. Once db has been migrated, run php artisan queue:work --tries=2

Thereafter you can naivgate to / and search for places.
