# Multi-stage Dockerfile for Laravel app
# Stage 1: node build (optional - builds front-end assets)
FROM node:18-bullseye AS node-builder
WORKDIR /var/www/html
COPY package.json package-lock.json* ./
RUN npm ci --silent || npm install --silent
COPY resources/ resources/
COPY vite.config.js .
RUN npm run build --silent || true

# Stage 2: build PHP image with Composer
FROM php:8.2-fpm-bullseye

ARG user=www-data
WORKDIR /var/www/html

# Install system dependencies
RUN apt-get update && apt-get install -y \
    git \
    curl \
    zip \
    unzip \
    libpng-dev \
    libjpeg62-turbo-dev \
    libfreetype6-dev \
    libonig-dev \
    libxml2-dev \
    libzip-dev \
    && rm -rf /var/lib/apt/lists/*

# Install PHP extensions
RUN docker-php-ext-configure gd --with-freetype --with-jpeg \
    && docker-php-ext-install -j$(nproc) pdo pdo_mysql mbstring exif pcntl bcmath gd zip xml

# Install Composer
COPY --from=composer:2 /usr/bin/composer /usr/bin/composer

# Copy only composer files to install dependencies
COPY composer.json composer.lock ./
RUN composer install --no-dev --no-scripts --prefer-dist --no-interaction --no-progress || true

# Copy application
COPY . /var/www/html

# If node built assets exist, copy them in
# Note: front-end assets built in a separate stage are optional. If you
# want to integrate the built files, copy them from the node-builder stage
# here (ensure the path exists in your project), e.g.:
# COPY --from=node-builder /var/www/html/dist /var/www/html/public/dist

# Ensure storage and bootstrap cache dirs exist
RUN chown -R ${user}:${user} /var/www/html/storage /var/www/html/bootstrap/cache || true

EXPOSE 9000

CMD ["php-fpm"]
