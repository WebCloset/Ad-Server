FROM php:8.2-apache

# Disable all MPMs first
RUN a2dismod mpm_event || true
RUN a2dismod mpm_worker || true
RUN a2dismod mpm_prefork || true

# Enable ONLY prefork (required for mod_php)
RUN a2enmod mpm_prefork

# Install MySQL extensions
RUN docker-php-ext-install mysqli pdo pdo_mysql

# Enable rewrite
RUN a2enmod rewrite

WORKDIR /var/www/html
COPY . .

RUN chown -R www-data:www-data /var/www/html

EXPOSE 80
CMD ["apache2-foreground"]