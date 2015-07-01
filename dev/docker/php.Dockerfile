FROM jbrinley/php:5.6-fpm
MAINTAINER Jonathan Brinley <jbrinley@flightless.us>

COPY dev/docker/php/php.ini /usr/local/etc/php/conf.d/php.ini
COPY src /srv/www/wordpress