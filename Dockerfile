
FROM php:8.2.14-apache

RUN a2dismod mpm_event || true
RUN a2dismod mpm_worker || true

RUN docker-php-ext-install mysqli pdo pdo_mysql
RUN a2enmod rewrite


# Set working directory
WORKDIR /var/www/html

# Copy files
COPY . .

# Fix permissions
RUN chown -R www-data:www-data /var/www/html

# Expose Apache port
EXPOSE 80

CMD ["apache2-foreground"]