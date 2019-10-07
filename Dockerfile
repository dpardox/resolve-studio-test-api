# Image based on the official PHP 7 image from dockerhub
FROM php:7.3-fpm

# Install dependencies
RUN apt-get update && apt-get install -y --no-install-recommends zip unzip git curl libpq-dev

# Clear cache
RUN apt-get clean && rm -rf /var/lib/apt/lists/* /tmp/* /var/tmp/* /usr/share/doc/*

# Install extensions
RUN docker-php-ext-configure pgsql -with-pgsql=/usr/local/pgsql
RUN docker-php-ext-install pdo pdo_pgsql pgsql

# Install composer
RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer

# Set working directory
WORKDIR /var/www

# Copy existing application directory contents
COPY ./src ./

# Install composer dependencies
RUN composer install -n && composer dump-autoload

# Laravel key
RUN php artisan key:generate

# Expose port 9000
EXPOSE 9000

# Start php-fpm server
CMD ["php-fpm"]