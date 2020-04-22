#!/bin/bash
set -e

source /common.sh

# first arg is `-f` or `--some-option`
if [ "${1#-}" != "$1" ]; then
	set -- wp "$@"
fi

# if our command is a valid wp-cli subcommand, let's invoke it through wp-cli instead
if sudo -u wp_php wp --path=/dev/null help "$1" > /dev/null 2>&1; then
	set -- wp "$@"
fi

# Execute CMD
sudo -E -u wp_php "$@"
