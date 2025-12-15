FROM php:8.2-apache

# Pastikan hanya satu MPM aktif
RUN a2dismod mpm_event mpm_worker \
 && a2enmod mpm_prefork

COPY . /var/www/html/

EXPOSE 80
