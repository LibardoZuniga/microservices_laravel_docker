FROM php:7.3-apache
RUN apt-get update                                              \
    && apt-get install -y --no-install-recommends git zip       \
    && docker-php-ext-install mysqli pdo pdo_mysql              \
    && a2enmod rewrite                                          \
    && chmod 777 -R -c /var/www


COPY vhost.conf /etc/apache2/sites-enabled/000-default.conf

# composer
RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer
RUN composer --version
EXPOSE 80


