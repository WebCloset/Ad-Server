FROM php:8.2-apache

# Install MySQL  extensions
RUN docker-php-ext-install mysqli pdo pdo_mysql

# Enable rewrite
RUN a2enmod rewrite

WORKDIR /var/www/html
COPY . .

RUN chown -R www-data:www-data /var/www/html

# Use custom entrypoint to ensure only one MPM is loaded on Railway
COPY docker-entrypoint.sh /usr/local/bin/docker-entrypoint.sh
RUN chmod +x /usr/local/bin/docker-entrypoint.sh

EXPOSE 80
CMD ["/usr/local/bin/docker-entrypoint.sh"]