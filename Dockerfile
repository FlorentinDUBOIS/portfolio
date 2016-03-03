FROM php:7.0.3-apache

COPY . /var/www/html/

RUN apt-get update && apt-get upgrade -y && apt-get install -y sendmail php-mail

EXPOSE 80
