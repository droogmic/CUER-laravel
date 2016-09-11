# CUER Laravel
Based on the [Laravel PHP Framework](https://github.com/laravel/laravel)

## Status
| develop | master |  stable |
|---|---|---|
| [![Build Status](https://travis-ci.org/droogmic/CUER-laravel.svg?branch=develop)](https://travis-ci.org/droogmic/CUER-laravel) | [![Build Status](https://travis-ci.org/droogmic/CUER-laravel.svg?branch=master)](https://travis-ci.org/droogmic/CUER-laravel) | [![Build Status](https://travis-ci.org/droogmic/CUER-laravel.svg?branch=stable)](https://travis-ci.org/droogmic/CUER-laravel) |

## Running with homestead
+ Follow the guide here: <https://laravel.com/docs/5.2/homestead>
+ Copy `.env.homestead` to `.env`
+ Run the following:
```
$ vagrant up
$ vagrant ssh
$ cd CUER
$ composer install
$ php artisan migrate
$ php artisan db:seed
```

---------------------------------

## [Laravel PHP Framework](https://laravel.com/)
