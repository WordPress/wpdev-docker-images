#!/bin/bash
set -e

source /docker-entrypoint.d/100-uid-gid.sh

# If LOCAL_PHP_XDEBUG=true xdebug extension will be enabled
if [ "$LOCAL_PHP_XDEBUG" = true ]; then
	docker-php-ext-enable xdebug
	rm -f /usr/local/etc/php/conf.d/docker-php-ext-opcache.ini
else
	docker-php-ext-enable opcache
	rm -f /usr/local/etc/php/conf.d/docker-php-ext-xdebug.ini
fi

# If LOCAL_PHP_MEMCACHED=true memcached extension will be enabled
if [ "$LOCAL_PHP_MEMCACHED" = true ]; then
	docker-php-ext-enable memcached
else
	rm -f /usr/local/etc/php/conf.d/docker-php-ext-memcached.ini
fi

### Change UID/GID
set_gid "${PHP_FPM_GID}" "wp_php"
set_uid "${PHP_FPM_UID}" "wp_php" "wp_php"

# Execute CMD
exec su wp_php -c "$@"
