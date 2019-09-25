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
usermod -o -u "${PHP_FPM_UID}" "wp_php"
groupmod -o -g "${PHP_FPM_GID}" "wp_php"

# first arg is `-f` or `--some-option`
if [ "${1#-}" != "$1" ]; then
	set -- wp "$@"
fi

# if our command is a valid wp-cli subcommand, let's invoke it through wp-cli instead
# (this allows for "docker run wordpress:cli help", etc)
if wp --path=/dev/null help "$1" > /dev/null 2>&1; then
	set -- wp "$@"
fi

# Execute CMD
exec su wp_php -c "$@"