# Use the official PHP image as the base image
FROM php:8.1-apache

# Set the working directory in the container
WORKDIR /app

# Install dependencies
RUN apt-get update && \
    apt-get install -y \
        libzip-dev \
        zip \
        unzip \
        curl \
        nodejs \
        npm

# Copy the application files to the container
# Copy Laravel application files
COPY . .

# Set appropriate permissions
RUN chown -R www-data:www-data /var/www/html
RUN chmod -R 755 /var/www/html

# Install Composer
RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer

# Update Composer dependencies
RUN composer update --no-interaction --no-scripts --no-dev --prefer-dist

# Install npm packages
RUN npm update
RUN npm install

# Set the appropriate permissions for Laravel
RUN chown -R www-data:www-data storage bootstrap/cache

# Expose port 80
EXPOSE 80

# Start Apache server
CMD ["apache2-foreground"]
