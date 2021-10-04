# edurio

## Installation

It is assumed that you have a running installation of Docker on your system.

First, copy `.env.example` to `.env` and set a mysql username and password. Then follow these instructions:

1. Open a terminal and go to the project root
2. Run `docker-compose up --build`
3. When services are running, run `docker-compose exec php-fpm composer install`
4. When composer is finished, run `docker-compose restart worker`
5. Run `docker-compose exec php-fpm php artisan migrate`
6. Run `docker-compose exec php-fpm php artisan db:seed`
7. Open `http://127.0.0.1:8000` in a browser

## Daily use

Start containers:

`docker-compose up -d`

Stop containers:

`docker-compose down`

Run composer:

`docker-compose exec php-fpm composer [install|require|update]`

Run migrations:

`docker-compose exec php-fpm php artisan db:migrate`

## Unit tests

Run unit tests:

`docker-compose exec php-fpm ./vendor/bin/phpunit`
