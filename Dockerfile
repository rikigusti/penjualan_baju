FROM php:8.2-apache

# pastikan hanya prefork yang aktif
RUN rm -f /etc/apache2/mods-enabled/mpm_event.load \
 && rm -f /etc/apache2/mods-enabled/mpm_worker.load

# copy file php
COPY . /var/www/html/

# pastikan Apache jalan
CMD ["apache2-foreground"]
