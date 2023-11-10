FROM php:8.2-apache

#COPY php.ini /usr/local/etc/php/

RUN apt-get update && apt-get install -y libpng-dev \
&& docker-php-ext-install pdo_mysql mysqli gd iconv

COPY ./php.localhost.conf /etc/apache2/sites-available/
COPY ./hosts /etc/hosts

RUN a2enmod rewrite

RUN service apache2 restart

WORKDIR /etc/apache2/sites-available/

RUN a2ensite php.localhost.conf

RUN rm /etc/apache2/sites-enabled/000-default.conf

RUN apt-get clean && apt-get autoclean

EXPOSE 86