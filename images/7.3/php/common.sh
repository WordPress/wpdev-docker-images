#!/bin/bash
set -e

# Check if an extension is available
extension_available() {
	local ext=$1
	if [ -f "/usr/local/lib/php/extensions/$(php -r 'echo PHP_EXTENSION_DIR;' | xargs basename)/${ext}.so" ]; then
		return 0
	fi
	return 1
}

# If LOCAL_PHP_XDEBUG=true xdebug extension will be enabled
if [ "$LOCAL_PHP_XDEBUG" = true ]; then
	if extension_available "xdebug"; then
		docker-php-ext-enable xdebug
		rm -f /usr/local/etc/php/conf.d/docker-php-ext-opcache.ini
	else
		echo "Warning: xdebug extension not available, skipping..."
	fi
else
	if extension_available "opcache"; then
		docker-php-ext-enable opcache
		rm -f /usr/local/etc/php/conf.d/docker-php-ext-xdebug.ini
	else
		# OPcache might be built-in, check if it's already loaded
		if ! php -m | grep -q "Zend OPcache"; then
			echo "Warning: opcache extension not available, skipping..."
		fi
	fi
fi

# If LOCAL_PHP_MEMCACHED=true memcached extension will be enabled
if [ "$LOCAL_PHP_MEMCACHED" = true ]; then
	if extension_available "memcached"; then
		docker-php-ext-enable memcached
	else
		echo "Warning: memcached extension not available, skipping..."
	fi
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
