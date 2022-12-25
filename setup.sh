#!/usr/bin/env bash

# Exit if any command returns error
set -e

# Assign color codes
WHITE='\033[1;37m'
NC='\033[0m'

if ! [ -n "$(grep "[[:space:]]hiking-trails-api.np" /etc/hosts)" ]; then
    sudo -- sh -c "echo '127.0.0.1 hiking-trails-api.np' >> /etc/hosts"
else
    echo "db exists in hostfile"
fi

# Docker compose up
echo -e "${WHITE}Bringing up docker containers...${NC}"
docker compose up -d

# Export path
export HTA_PATH=./

# Get required variables from env.example file
export $(grep DB_USERNAME ${HTA_PATH}/.env.example)
export $(grep DB_PASSWORD ${HTA_PATH}/.env.example)

if [[ $1 == "" ]] || [[ $1 == "--only=hta" ]]; then
    # HTA: Storage permissions
    touch ${HTA_PATH}/storage/logs/nginx-error.log
    touch ${HTA_PATH}/storage/logs/nginx-access.log
    sudo -- sh -c "chown $USER:www-data -R ${HTA_PATH}/storage"
    sudo -- sh -c "chmod g+w -R ${HTA_PATH}/storage"

    # HTA: Create environment files
    touch ${HTA_PATH}/.env

    cp -f ${HTA_PATH}/.env.example ${HTA_PATH}/.env

    echo -e "${WHITE}HTA container: Installing composer dependencies...${NC}"
    docker compose exec hta composer install

    echo -e "${WHITE}HTA container: Generating artisan key...${NC}"
    docker compose exec hta php artisan key:generate

    echo -e "${WHITE}HTA container: Migrating and seeding the database...${NC}"
    docker compose exec hta php artisan migrate:fresh --seed
fi

echo -e "${WHITE}Setup complete. Enjoy your local development environment ;)${NC}"
