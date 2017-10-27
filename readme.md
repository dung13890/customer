# Toan Thang System

## Project was builded by Mr. D
* php7.0
* php-fpm7.0
* nginx1.13.3
* mysql5.7.19

## Run with docker
> Git
> Required Docker && docker-compose

```sh
// Create domain dev
$ sudo vim /etc/hosts
// add domain
127.0.0.1   toanthang.dev


$ git clone git@github.com:dung13890/toanthang.git toanthang
$ cd toanthang

$ docker-compose up -d
```


## Start Project

```sh
$ docker-compose exec workspace bash

// Inside docker
$ composer install --no-interaction
$ cp .env.example .env
$ php artisan key:generate
$ php artisan migrate:refresh --seed

$ npm install
$ bower install --allow-root

$ npm run dev

```

## Generate js

```sh
// Generate laroute
$ php artisan laroute:generate

// Generate message lang
$ php artisan lang:js --no-lib
```
