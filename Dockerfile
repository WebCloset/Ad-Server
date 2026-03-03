FROM php:8.2-apache

# Install MySQL  extensions
RUN docker-php-ext-install mysqli pdo pdo_mysql

# Enable rewrite and ensure only prefork MPM is active
RUN a2enmod rewrite \
 && a2dismod mpm_event mpm_worker || true

WORKDIR /var/www/html
COPY . .

RUN chown -R www-data:www-data /var/www/html

EXPOSE 80
CMD ["apache2-foreground"]