FROM nginx:1.9
MAINTAINER Jonathan Brinley <jbrinley@flightless.us>

COPY dev/docker/nginx /etc/nginx
COPY src /srv/www/wordpress