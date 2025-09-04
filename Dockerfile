# Use a base image with PHP and a web server
FROM php:8.2-fpm-alpine

# Set the working directory inside the container
WORKDIR /app

# Copy the Laravel project files into the container
COPY . /app

# Install system dependencies for PHP
RUN apk add --no-cache \
    curl \
    unzip \
    zip \
    nginx

# Install Composer
COPY --from=composer:latest /usr/bin/composer /usr/local/bin/composer

# Install PHP dependencies from composer.json
RUN composer install --no-dev --optimize-autoloader

# Expose port 80 to the host machine
EXPOSE 8000

# Start the PHP development server
CMD ["php", "artisan", "serve", "--host=0.0.0.0", "--port=8000"]