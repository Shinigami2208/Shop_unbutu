start:
	- sudo docker-compose up -d
	- sudo docker-compose run npm run watch
clear-config:
	- sudo docker-compose run php php artisan config:cache
composer: 
	- sudo docker-compose run composer composer
migrate:
	- sudo docker-compose run php php artisan migrate 
php:
	- sudo docker-compose run php php
