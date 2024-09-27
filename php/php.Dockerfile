# Use PHP 8.3 with Apache
FROM php:8.3-apache

# Install necessary PHP extensions
RUN docker-php-ext-install mysqli pdo pdo_mysql

# Expose port 80 for the Apache web server
EXPOSE 80
