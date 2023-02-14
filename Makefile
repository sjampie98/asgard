SHELL := /bin/bash
ALL: up
.PHONY: composer seed up up-force down sh test supervisor

install:
	@cp docker-compose.override.yml.local docker-compose.override.yml
	@cp .env.example .env
	@docker-compose build --no-cache
	@docker-compose up -d
	@docker-compose exec -T asgard_php_fpm composer install --no-interaction
	@make created

composer:
	@docker-compose exec -T asgard_php_fpm composer install --no-interaction

created:
	@docker-compose exec -T asgard_php_fpm composer run-script post-create-project-cmd --no-interaction

clear:
	@docker-compose exec -T asgard_php_fpm composer run-script clear-cache-project-cmd --no-interaction

build:
	@docker-compose build

up:
	@docker-compose up -d

migrate:
	@docker-compose exec -T asgard_php_fpm php artisan migrate --force --no-interaction

seed:
	@docker-compose exec -T asgard_php_fpm php artisan db:seed

restart-consumers:
	@docker-compose restart asgard_php_cli

ps:
	@docker-compose ps

pull:
	@sh checkout.sh
	@make composer
	@make clear
	@make migrate
	@make restart-consumers

prepare-deploy:
	@make syntax
	@make tests

push:
	@make syntax
	@make tester
	@git push --set-upstream origin $(branch)

down:
	@docker-compose down

sh:
	@docker-compose exec asgard_php_fpm sh

swagger:
	@docker-compose exec -T asgard_php_fpm php artisan swagger:generate

tester:
	@docker-compose exec -T asgard_php_fpm php artisan test -d memory_limit=256M --bootstrap vendor/autoload.php --configuration phpunit.xml --testsuite Unit

syntax:
	@docker-compose exec -T asgard_php_fpm composer dump-autoload
	@docker-compose exec -T asgard_php_fpm vendor/bin/phpcs -p --error-severity=1 --warning-severity=8 --extensions=php /var/www/app
