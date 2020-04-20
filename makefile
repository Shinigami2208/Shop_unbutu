start:
	- sudo docker-compose up -d
	- sudo docker-compose run npm run watch
clear-config:
	- sudo docker-compose run php php artisan config:cache
composer: 
	- sudo docker-compose run composer composer
migrate:
	- sudo docker-compose run php php artisan migrate 
php-container:
	- sudo docker-compose exec php sh
php:
	- sudo docker-compose run php php
install:
	- sudo docker-compose run npm install
	- sudo docker-compose run npm run dev
	- sudo docker-compose run composer composer install
	- sudo docker-compose run php php artisan config:cache
	- sudo docker-compose up -d
	- sudo docker-compose run php php artisan migrate 
	- sudo docker-sompose run php php artisan db:seed
	- sudo docker-compose run npm run watch
stop: 
	- sudo docker stop