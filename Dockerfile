# Dockerfile
FROM php:8.2-fpm-alpine

# Instalar extensões do PHP
RUN docker-php-ext-install pdo pdo_mysql

# Configurar o diretório de trabalho
WORKDIR /var/www/symfony
