#!/bin/sh
set -e

# write the php-fpm config
{
    echo listen = /var/run/php/php8.1-fpm.sock
    echo listen.owner = www-data
    echo listen.group = www-data
    echo pm.max_children = "$FPM_PM_MAX_CHILDREN"
    echo pm.start_servers = "$FPM_PM_START_SERVERS"
    echo pm.min_spare_servers = "$FPM_PM_MIN_SPARE_SERVERS"
    echo pm.max_spare_servers = "$FPM_PM_MAX_SPARE_SERVERS"
} >/usr/local/etc/php-fpm.d/zzz-app.conf

exec "$@"
