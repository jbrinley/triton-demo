#!/bin/bash

docker create -v /var/lib/mysql -m 128m --name wordpress_mysqldata busybox /bin/true
docker create -v /srv/www/wordpress/content/uploads -m 128m --name wordpress_uploads busybox /bin/true