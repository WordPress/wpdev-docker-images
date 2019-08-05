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

# Execute CMD
exec "$@"
