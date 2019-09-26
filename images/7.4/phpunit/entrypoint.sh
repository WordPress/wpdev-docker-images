#!/bin/bash
set -e

source /common.sh

# Execute CMD
sudo -u wp_php "$@"
