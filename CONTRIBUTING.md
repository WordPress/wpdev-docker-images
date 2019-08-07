# Contributing

Thank you for considering contributing to WordPress' development Docker images! If you're unsure of anything, know that you're 💯 welcome to submit an issue or pull request on any topic. The worst that can happen is that you'll be politely directed to the best location to ask your question or to change something in your pull request. We appreciate any sort of contribution and don't want a wall of rules to get in the way of that.

As with all WordPress projects, we want to ensure a welcoming environment for everyone. With that in mind, all contributors are expected to follow our [Code of Conduct](/CODE_OF_CONDUCT.md).

All WordPress projects are [licensed under the GPLv2+](/LICENSE), and all contributions to this project will be released under the GPLv2+ license. You maintain copyright over any contribution you make, and by submitting a pull request, you are agreeing to release that contribution under the GPLv2+ license.

This document covers the technical details around setup, and submitting your contribution to this project.

## Generating Images

After modifying any of the Dockerfile template files, you'll need to regenerate them built Dockerfiles. You can do this by running `php update.php`, you should see your changes reflect across all PHP versions.

## Testing Images

When submitting a Pull Request, images will be automatically built for you, and hosted on the GitHub Package Registry. As this service is currently in beta, you will need to login to the package registry, even for pulling images. You can read more about this in the [GitHub Package Registry documentation](https://help.github.com/en/articles/configuring-docker-for-use-with-github-package-registry).

Once Travis finishes building all of these packages, you can modify [`docker-compose.yml`](WordPress/wordpress-develop/tools/local-env/docker-compose.yml) and [`docker-compose.scripts.yml`](WordPress/wordpress-develop/tools/local-env/docker-compose.scripts.yml) to pull from GitHub. For example, the `image` in the PHP container would change from `wordpressdevelop/php:${LOCAL_PHP-latest}` to `docker.pkg.github.com/wordpress/wpdev-docker-images/php:${LOCAL_PHP-latest}-PR_NUMBER`, where `PR_NUMBER` is the number of the Pull Request you submitted.
