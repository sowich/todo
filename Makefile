up: docker-up

down: docker-down

init: docker-clear docker-up api-env api-composer pause frontend-env frontend-install frontend-build

docker-clear:
	docker-compose down --remove-orphans
	sudo rm -rf api/var/docker

docker-up:
	docker-compose up --build -d

docker-down:
	docker-compose stop

pause:
	sleep 5

api-env:
	docker-compose exec api-php-cli rm -f .env
	docker-compose exec api-php-cli ln -sr .env.example .env

api-composer:
	docker-compose exec api-php-cli composer install

frontend-env:
	docker-compose exec frontend-nodejs rm -f .env.local
	docker-compose exec frontend-nodejs ln -sr .env.local.example .env.local

frontend-install:
	docker-compose exec frontend-nodejs npm install

frontend-build:
	docker-compose exec frontend-nodejs npm run build