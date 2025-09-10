FROM php:8.3-apache
RUN apt-get update && apt-get install -y \
    sudo \
    curl \
    unzip \
    git \
    && rm -rf /var/lib/apt/lists/*

RUN a2enmod rewrite
WORKDIR /var/www/html
ARG user_id=1000
ARG group_id=1000
RUN if [ "$(id -u www-data)" != "$user_id" ]; then usermod -u $user_id www-data; fi \
    && if [ "$(getent group www-data | cut -d: -f3)" != "$group_id" ]; then groupmod -g $group_id www-data; fi

RUN chown -R www-data:www-data /var/www/html
COPY . .
EXPOSE 80
CMD ["apache2-foreground"]
