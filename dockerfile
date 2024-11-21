# Use an official PHP image
FROM php:8.1-apache

# Set the working directory inside the container
WORKDIR /var/www/html

# Copy the current directory's contents to the container
COPY . .

# Install any necessary PHP extensions
RUN docker-php-ext-install mysqli pdo pdo_mysql

# Enable Apache mod_rewrite for pretty URLs (if needed)
RUN a2enmod rewrite

# Set appropriate permissions for the web root
RUN chown -R www-data:www-data /var/www/html \
    && chmod -R 755 /var/www/html

# Expose the default Apache port
EXPOSE 80

# Start the Apache server
CMD ["apache2-foreground"]
