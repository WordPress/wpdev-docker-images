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
WP_PHP_UID="${PHP_FPM_UID-1000}"
WP_PHP_GID="${PHP_FPM_GID-1000}"

if [ "$WP_PHP_UID" != "`id -u wp_php`" ]; then
	usermod -o -u "${WP_PHP_UID}" "wp_php"
fi

if [ "$WP_PHP_GID" != "`id -g wp_php`" ]; then
	groupmod -o -g "${WP_PHP_GID}" "wp_php"
fi
