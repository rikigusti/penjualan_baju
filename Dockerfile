FROM php:8.2-apache

RUN rm -f /etc/apache2/mods-enabled/mpm_event.load \
 && rm -f /etc/apache2/mods-enabled/mpm_worker.load

COPY . /var/www/html/

EXPOSE 80
