FROM php:8.2-apache

# Install mysqli extension
RUN docker-php-ext-install mysqli && docker-php-ext-enable mysqli

# Enable Apache mod_rewrite for .htaccess support
RUN a2enmod rewrite

# Set working directory
WORKDIR /var/www/html

# Copy project files
COPY . .

# Adjust permissions
RUN chown -R www-data:www-data /var/www/html

# Set the port Render expects (default is 10000 but Apache uses 80 by default)
# We'll use Render's default port 10000 or stick to 80 as Render handles the port mapping.
EXPOSE 80
