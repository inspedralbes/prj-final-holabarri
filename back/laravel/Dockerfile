FROM php:8.2-fpm

RUN apt update && apt install -y \
    git \
    curl \
    libpng-dev \
    libonig-dev \
    libxml2-dev \
    zip \
    unzip \
    libpq-dev

RUN apt clean && rm -rf /var/lib/apt/lists/*

RUN docker-php-ext-install pdo_mysql mbstring exif pcntl bcmath gd

WORKDIR /var/www/html

COPY --from=composer:latest /usr/bin/composer /usr/bin/composer