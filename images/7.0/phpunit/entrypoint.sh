#!/bin/bash
set -e

source /common.sh

chown -R wp_php:wp_php /var/www/${LOCAL_DIR-src}/wp-content/uploads

# Execute CMD
sudo -u wp_php "$@"
