FROM php:8.3-apache

RUN a2enmod rewrite headers
RUN echo "\nServerName localhost" >> /etc/apache2/apache2.conf

RUN apt-get -y update && apt-get install -y libicu-dev && docker-php-ext-configure intl && docker-php-ext-install intl