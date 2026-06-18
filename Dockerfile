# Stage 1: PHP Dependencies
FROM php:8.2-fpm-alpine as vendor

WORKDIR /app

# Install system dependencies
RUN apk add --no-cache \
    git \
    unzip \
    libzip-dev \
    zip

# Install PHP extensions
RUN docker-php-ext-install zip pdo_mysql

# Install Composer
COPY --from=composer:latest /usr/bin/composer /usr/bin/composer

# Copy composer files
COPY composer.json composer.lock ./

# Install dependencies
RUN composer install \
    --no-dev \
    --no-interaction \
    --no-plugins \
    --no-scripts \
    --prefer-dist

# Stage 2: Frontend Assets
FROM node:20-alpine as frontend

WORKDIR /app

# Copy package files
COPY package.json package-lock.json* ./

# Install dependencies
RUN npm install

# Copy source files
COPY . .

# Build assets
RUN npm run build

# Stage 3: Final Image
FROM php:8.2-fpm-alpine

WORKDIR /var/www/html

# Install system dependencies
RUN apk add --no-cache \
    nginx \
    supervisor \
    libzip-dev \
    libpng-dev \
    libjpeg-turbo-dev \
    freetype-dev

# Install PHP extensions
RUN docker-php-ext-configure gd --with-freetype --with-jpeg \
    && docker-php-ext-install pdo_mysql zip gd bcmath

# Copy application code
COPY . .

# Copy vendor and public/build from previous stages
COPY --from=vendor /app/vendor ./vendor
COPY --from=frontend /app/public/build ./public/build

# Set permissions
RUN chown -R www-data:www-data /var/www/html/storage /var/www/html/bootstrap/cache

# Copy configuration files
COPY docker/nginx.conf /etc/nginx/nginx.conf
COPY docker/supervisord.conf /etc/supervisord.conf
COPY docker/php.ini /usr/local/etc/php/conf.d/app.ini

# Expose port
EXPOSE 80

# Start supervisor
CMD ["/usr/bin/supervisord", "-c", "/etc/supervisord.conf"]
