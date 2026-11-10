#!/usr/bin/env bash
echo "Rodando o Composer..."
composer install --no-dev --working-dir=/var/www/html

echo "Limpando e gerando caches do Laravel..."
php artisan config:cache
php artisan route:cache
php artisan view:cache

echo "Executando migrações do banco de dados..."
php artisan migrate --force