#!/bin/bash
set -e

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
usermod -o -u "${PHP_FPM_UID-1000}" "wp_php"
groupmod -o -g "${PHP_FPM_GID-1000}" "wp_php"

# Execute CMD
su -m wp_php -c '"$0" "$@"' -- "$@"

