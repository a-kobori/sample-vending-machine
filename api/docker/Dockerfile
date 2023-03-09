FROM php:8.2-apache

RUN apt-get update && apt-get install -y \
    git \
    libonig-dev \
    vim \
  && docker-php-ext-install pdo_mysql mysqli

RUN a2enmod headers
RUN a2enmod rewrite

COPY --from=composer /usr/bin/composer /usr/bin/composer

COPY ./docker/etc/apacheconf/001_headers.conf /etc/apache2/sites-enabled/001_headers.conf
