#!/bin/bash
set -e

source /common.sh

chown -R wp_php:wp_php /var/www/${LOCAL_DIR-src}/wp-content/uploads

# Execute CMD
sudo -E -u wp_php "$@"
