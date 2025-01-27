#!/bin/bash

# Source existing .env
. .env

remove_and_run() {
    trap 'echo "Exiting function with status 1..."; exit 1' INT TERM

    echo -e "Generate laravel echo config..."
    sleep 2
    bash bin/generate-echo-config.sh

    echo -e "Copying laravel echo config to config folder..."
    sleep 2
    mv laravel-echo-server.json conf/laravel-echo-server.json

    docker-compose up -d || exit 1

    echo -e "Running clear optimization..."
    sleep 2
    docker exec -i ${APP_NAME}-app php artisan optimize:clear

    echo "Running optimize..."
    sleep 2
    docker exec -i ${APP_NAME}-app php artisan optimize

    echo "Running migrate... (wait 30s)"
    sleep 30
    docker exec -i ${APP_NAME}-app php artisan migrate --force

    echo "Running seed..."
    sleep 2
    docker exec -i ${APP_NAME}-app php artisan db:seed --force

    echo "Running storage link..."
    sleep 2
    docker exec -i ${APP_NAME}-app php artisan storage:link --force

    echo "Running chmod on log folder..."
    sleep 2
    docker exec -i ${APP_NAME}-app chmod -R 0777 /var/www/app/storage/logs

    echo "Running chmod on files folder..."
    sleep 2
    docker exec -i ${APP_NAME}-app chmod -R 0777 /var/www/app/storage/app/public/files

    docker system prune -f
    docker volume prune -f
    docker image prune -a -f
}

if command -v docker-compose >/dev/null 2>&1; then
    echo "docker-compose is available"
    remove_and_run
    exit 0
else
    echo "docker-compose is not available"
    exit 1
fi
