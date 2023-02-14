#!/bin/sh

composer install --prefer-dist --no-ansi --no-interaction --no-progress --no-scripts

php-fpm
