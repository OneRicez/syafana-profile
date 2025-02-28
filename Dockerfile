FROM php:8.2-fpm-bullseye

# Update repositori dan install dependencies
RUN apt-get update && apt-get install -y \
    curl \
    git \
    unzip \
    libpng-dev \
    libonig-dev \
    libxml2-dev \
    zip \
    libzip-dev \
    gnupg \
    nginx \
    mariadb-client \
    libicu-dev

# Install Node.js (latest LTS version)
RUN curl -fsSL https://deb.nodesource.com/setup_20.x | bash - \
    && apt-get install -y nodejs

# Install PHP extensions
RUN docker-php-ext-install pdo_mysql mbstring exif pcntl bcmath gd zip intl

# Install Composer
COPY --from=composer:latest /usr/bin/composer /usr/bin/composer

# Set working directory
WORKDIR /var/www/html

# Copy project files
COPY . .

# Set permissions
RUN chown -R www-data:www-data /var/www/html

# Install Laravel dependencies
USER www-data
RUN composer install --no-interaction --prefer-dist --optimize-autoloader

# Revert to root user
USER root

# Install npm dependencies and build assets
RUN npm install && npm run build

# Ensure necessary Laravel directories are writable
RUN chmod -R 775 storage bootstrap/cache

# Copy Nginx configuration
COPY ./nginx/default.conf /etc/nginx/sites-available/default

# Expose ports
EXPOSE 80 9000

# Start Nginx and PHP-FPM
CMD service nginx start && php-fpm