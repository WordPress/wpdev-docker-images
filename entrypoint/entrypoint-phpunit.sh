#!/bin/bash
set -e

source /common.sh

chown -R /var/www/${LOCAL_DIR-src}/wp-content/uploads wp_php:wp_php

# Execute CMD
sudo -u wp_php "$@"
