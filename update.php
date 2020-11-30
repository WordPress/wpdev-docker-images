<?php

// The latest stable version of PHP that is supported in WordPress trunk.
$latest = '7.4';

/**
 * An array of all PHP versions that we need to generate images for, and their config settings.
 *
 * Each PHP version has settings for the PHP base image, the PHPUnit image, and the WP_CLI image.
 *
 * @param array $php {
 *     @type string $base_name       The name of the Docker image to base our image off of.
 *     @type array  $apt             An array of apt packages that need to be installed.
 *     @type array  $extensions      An array of PHP extensions that need to be enabled.
 *     @type array  $pecl_extensions An array of PECL-sourced PHP extensions that will be installed, but not enabled.
 * }
 *
 * @param int $phpunit The major version branch of PHPUnit to install on this image.
 *
 * @param array|false $cli {
 *     @type string $mysql_client The name of the MySQL client Ubuntu package on this image.
 *     @type string $download_url The download URL for the version of WP-CLI to install on this image.
 * }
 */
$php_versions = array(
	'5.2' => array(
		'php' => array(
			'base_name'       => 'devilbox/php-fpm-5.2:latest',
			'apt'             => array( 'sudo', 'rsync' ),
			'extensions'      => array(),
			'pecl_extensions' => array( 'zendopcache-7.0.5', 'xdebug-2.2.7' ),
			'composer'        => false,
		),
		'phpunit' => 3,
		'cli' => false,
	),
	'5.3' => array(
		'php' => array(
			'base_name'       => 'devilbox/php-fpm-5.3:latest',
			'apt'             => array( 'libjpeg-dev', 'libpng-dev', 'libzip-dev', 'libmemcached-dev', 'unzip', 'libmagickwand-dev', 'ghostscript', 'libicu-dev', 'libonig-dev', 'locales', 'sudo', 'rsync', 'libxslt-dev' ),
			'extensions'      => array( 'gd', 'mysql', 'mysqli', 'zip', 'exif', 'intl', 'mbstring', 'xml', 'xsl' ),
			'pecl_extensions' => array( 'zendopcache-7.0.5', 'xdebug-2.2.7' ),
			'composer'        => true,
		),
		'phpunit' => 4,
		'cli' => array(
			'mysql_client' => 'mysql-client',
			'download_url' => 'https://github.com/wp-cli/wp-cli/releases/download/v1.5.1/wp-cli-1.5.1.phar',
		),
	),
	'5.4' => array(
		'php' => array(
			'base_name'       => 'php:5.4-fpm',
			'apt'             => array( 'libjpeg-dev', 'libpng-dev', 'libzip-dev', 'libmemcached-dev', 'unzip', 'libmagickwand-dev', 'ghostscript', 'libicu-dev', 'libonig-dev', 'locales', 'sudo', 'rsync', 'libxslt-dev' ),
			'extensions'      => array( 'gd', 'mysql', 'mysqli', 'zip', 'exif', 'intl', 'mbstring', 'xml', 'xsl' ),
			'pecl_extensions' => array( 'zendopcache-7.0.5', 'xdebug-2.4.1', 'memcached-2.2.0', 'imagick-3.4.4' ),
			'composer'        => true,
		),
		'phpunit' => 4,
		'cli' => array(
			'mysql_client' => 'mysql-client',
			'download_url' => 'https://raw.githubusercontent.com/wp-cli/builds/gh-pages/phar/wp-cli.phar',
		),
	),
	'5.5' => array(
		'php' => array(
			'base_name'       => 'php:5.5-fpm',
			'apt'             => array( 'libjpeg-dev', 'libpng-dev', 'libzip-dev', 'libmemcached-dev', 'unzip', 'libmagickwand-dev', 'ghostscript', 'libicu-dev', 'libonig-dev', 'locales', 'sudo', 'rsync', 'libxslt-dev' ),
			'extensions'      => array( 'gd', 'mysql', 'mysqli', 'zip', 'exif', 'intl', 'mbstring', 'xml', 'xsl' ),
			'pecl_extensions' => array( 'xdebug-2.5.5', 'memcached-2.2.0', 'imagick-3.4.4' ),
			'composer'        => true,
		),
		'phpunit' => 4,
		'cli' => array(
			'mysql_client' => 'mysql-client',
			'download_url' => 'https://raw.githubusercontent.com/wp-cli/builds/gh-pages/phar/wp-cli.phar',
		),
	),
	'5.6.20' => array( // WordPress' minumum PHP requirement as of WordPress 5.3.
		'php' => array(
			'base_name'       => 'php:5.6.20-fpm',
			'apt'             => array( 'libjpeg-dev', 'libpng-dev', 'libzip-dev', 'libmemcached-dev', 'unzip', 'libmagickwand-dev', 'ghostscript', 'libicu-dev', 'libonig-dev', 'locales', 'sudo', 'rsync', 'libxslt-dev' ),
			'extensions'      => array( 'gd', 'mysql', 'mysqli', 'zip', 'exif', 'intl', 'mbstring', 'xml', 'xsl' ),
			'pecl_extensions' => array( 'xdebug-2.5.5', 'memcached-2.2.0', 'imagick-3.4.4' ),
			'composer'        => true,
		),
		'phpunit' => 5,
		'cli' => array(
			'mysql_client' => 'mysql-client',
			'download_url' => 'https://raw.githubusercontent.com/wp-cli/builds/gh-pages/phar/wp-cli.phar',
		),
	),
	'5.6' => array(
		'php' => array(
			'base_name'       => 'php:5.6-fpm',
			'apt'             => array( 'libjpeg-dev', 'libpng-dev', 'libzip-dev', 'libmemcached-dev', 'unzip', 'libmagickwand-dev', 'ghostscript', 'libonig-dev', 'locales', 'sudo', 'rsync', 'libxslt-dev' ),
			'extensions'      => array( 'gd', 'mysql', 'mysqli', 'zip', 'exif', 'intl', 'mbstring', 'xml', 'xsl' ),
			'pecl_extensions' => array( 'xdebug-2.5.5', 'memcached-2.2.0', 'imagick-3.4.4' ),
			'composer'        => true,
		),
		'phpunit' => 5,
		'cli' => array(
			'mysql_client' => 'virtual-mysql-client',
			'download_url' => 'https://raw.githubusercontent.com/wp-cli/builds/gh-pages/phar/wp-cli.phar',
		),
	),
	'7.0' => array(
		'php' => array(
			'base_name'       => 'php:7.0-fpm',
			'apt'             => array( 'libjpeg-dev', 'libpng-dev', 'libzip-dev', 'libmemcached-dev', 'unzip', 'libmagickwand-dev', 'ghostscript', 'libonig-dev', 'locales', 'sudo', 'rsync', 'libxslt-dev' ),
			'extensions'      => array( 'gd', 'opcache', 'mysqli', 'zip', 'exif', 'intl', 'mbstring', 'xml', 'xsl' ),
			'pecl_extensions' => array( 'xdebug-2.7.2', 'memcached-3.1.5', 'imagick' ),
			'composer'        => true,
		),
		'phpunit' => 6,
		'cli' => array(
			'mysql_client' => 'virtual-mysql-client',
			'download_url' => 'https://raw.githubusercontent.com/wp-cli/builds/gh-pages/phar/wp-cli.phar',
		),
	),
	'7.1' => array(
		'php' => array(
			'base_name'       => 'php:7.1-fpm',
			'apt'             => array( 'libjpeg-dev', 'libpng-dev', 'libzip-dev', 'libmemcached-dev', 'unzip', 'libmagickwand-dev', 'ghostscript', 'libonig-dev', 'locales', 'sudo', 'rsync', 'libxslt-dev' ),
			'extensions'      => array( 'gd', 'opcache', 'mysqli', 'zip', 'exif', 'intl', 'mbstring', 'xml', 'xsl' ),
			'pecl_extensions' => array( 'xdebug-2.9.8', 'memcached-3.1.5', 'imagick' ),
			'composer'        => true,
		),
		'phpunit' => 7,
		'cli' => array(
			'mysql_client' => 'virtual-mysql-client',
			'download_url' => 'https://raw.githubusercontent.com/wp-cli/builds/gh-pages/phar/wp-cli.phar',
		),
	),
	'7.2' => array(
		'php' => array(
			'base_name'       => 'php:7.2-fpm',
			'apt'             => array( 'libjpeg-dev', 'libpng-dev', 'libzip-dev', 'libmemcached-dev', 'unzip', 'libmagickwand-dev', 'ghostscript', 'libonig-dev', 'locales', 'sudo', 'rsync', 'libxslt-dev' ),
			'extensions'      => array( 'gd', 'opcache', 'mysqli', 'zip', 'exif', 'intl', 'mbstring', 'xml', 'xsl' ),
			'pecl_extensions' => array( 'xdebug-2.9.8', 'memcached-3.1.5', 'imagick' ),
			'composer'        => true,
		),
		'phpunit' => 7,
		'cli' => array(
			'mysql_client' => 'virtual-mysql-client',
			'download_url' => 'https://raw.githubusercontent.com/wp-cli/builds/gh-pages/phar/wp-cli.phar',
		),
	),
	'7.3' => array(
		'php' => array(
			'base_name'       => 'php:7.3-fpm',
			'apt'             => array( 'libjpeg-dev', 'libpng-dev', 'libzip-dev', 'libmemcached-dev', 'unzip', 'libmagickwand-dev', 'ghostscript', 'libonig-dev', 'locales', 'sudo', 'rsync', 'libxslt-dev' ),
			'extensions'      => array( 'gd', 'opcache', 'mysqli', 'zip', 'exif', 'intl', 'mbstring', 'xml', 'xsl' ),
			'pecl_extensions' => array( 'xdebug-2.9.8', 'memcached-3.1.5', 'imagick' ),
			'composer'        => true,
		),
		'phpunit' => 7,
		'cli' => array(
			'mysql_client' => 'virtual-mysql-client',
			'download_url' => 'https://raw.githubusercontent.com/wp-cli/builds/gh-pages/phar/wp-cli.phar',
		),
	),
	'7.4' => array(
		'php' => array(
			'base_name'       => 'php:7.4-fpm',
			'apt'             => array( 'libjpeg-dev', 'libpng-dev', 'libzip-dev', 'libmemcached-dev', 'unzip', 'libmagickwand-dev', 'ghostscript', 'libonig-dev', 'locales', 'sudo', 'rsync', 'libxslt-dev' ),
			'extensions'      => array( 'gd', 'opcache', 'mysqli', 'zip', 'exif', 'intl', 'mbstring', 'xml', 'xsl' ),
			'pecl_extensions' => array( 'xdebug-2.9.8', 'memcached-3.1.5', 'imagick' ),
			'composer'        => true,
		),
		'phpunit' => 7,
		'cli' => array(
			'mysql_client' => 'virtual-mysql-client',
			'download_url' => 'https://raw.githubusercontent.com/wp-cli/builds/gh-pages/phar/wp-cli.phar',
		),
	),
	'8.0' => array(
		'php' => array(
			'base_name'       => 'php:8.0.0RC4-fpm',
			'apt'             => array( 'libjpeg-dev', 'libpng-dev', 'libzip-dev', 'libmemcached-dev', 'unzip', 'libmagickwand-dev', 'ghostscript', 'libonig-dev', 'locales', 'sudo', 'rsync', 'libxslt-dev' ),
			'extensions'      => array( 'gd', 'opcache', 'mysqli', 'zip', 'exif', 'intl', 'mbstring', 'xml', 'xsl' ),
			'pecl_extensions' => array( 'memcached-3.1.5' ),
			'composer'        => true,
		),
		'phpunit' => 9,
		'cli' => array(
			'mysql_client' => 'virtual-mysql-client',
			'download_url' => 'https://raw.githubusercontent.com/wp-cli/builds/gh-pages/phar/wp-cli.phar',
		),
	),
);

/**
 * An array of all PHPUnit and PHP version combinations that we need to generate images for.
 *
 * Different WordPress versions support different versions of PHP and different versions of PHPUnit.
 * This creates a need to run multiple versions of PHPUnit on each version of PHP.
 *
 * @param array $phpunit_version A list of PHP versions for each PHPUnit version.
 */
$phpunit_versions = array(
	'9' => array(
		'8.0',
		'7.4',
		'7.3',
	),
	'8' => array(
		'7.4',
		'7.3',
		'7.2',
	),
	'7' => array(
		'7.4',
		'7.3',
		'7.2',
		'7.1',
		'7.0',
	),
	'6' => array(
		'7.3',
		'7.2',
		'7.1',
		'7.0',
	),
	'5' => array(
		'7.0',
		'5.6.20',
		'5.6',
	),
	'4' => array(
		'5.6.20',
		'5.6',
	)
);

// A warning that will be added to each Dockerfile, to ensure folks don't edit them directly.
$generated_warning = <<<EOT
##########################################################################
#
# WARNING: This file was generated by update.php.
#
# You can find the relevant template in the `/templates` folder.
#
EOT;

// Load the templates.
$templates = array(
	'php'     => file_get_contents( 'templates/Dockerfile-php.template' ),
	'phpunit' => file_get_contents( 'templates/Dockerfile-phpunit.template' ),
	'cli'     => file_get_contents( 'templates/Dockerfile-cli.template' ),
);

$build_cmds = array(
	'php'     => array(),
	'phpunit' => array(),
	'cli'     => array(),
);

// Loop through each PHP version, and generate the Dockerfiles.
foreach ( $php_versions as $version => $images ) {
	$title = "| PHP $version |";
	echo str_repeat( '-', strlen( $title ) ) . "\n";
	echo "$title\n";
	echo str_repeat( '-', strlen( $title ) ) . "\n";

	foreach ( $images as $image => $config ) {
		echo str_pad( $image, 15, '.' );
		echo shell_exec( "mkdir -p images/{$version}/{$image}" );

		$dockerfile = $templates[ $image ];

		$dockerfile = str_replace( '%%GENERATED_WARNING%%', $generated_warning, $dockerfile );

		// PHPUnit and WP-CLI image parent tags vary depending on whether it's a PHP version, or "latest".
		if ( 'latest' === $version ) {
			$version_tag = 'latest';
		} else {
			$version_tag = "$version-fpm";
		}
		$dockerfile = str_replace( '%%VERSION_TAG%%', $version_tag, $dockerfile );

		if ( $image === 'php' ) {
			// Replace tags inside the PHP Dockerfile template.
			$dockerfile = str_replace( '%%BASE_NAME%%', $config['base_name'], $dockerfile );

			if ( $config['apt'] || $config['extensions'] || $config['pecl_extensions'] || $config['composer'] ) {
				$install_extensions = "# install the PHP extensions we need\nRUN set -ex;";

				// Composer requires git to be installed in some circumstances (e.g. `composer install --prefer-source`).
				if ( $config['composer'] ) {
					$config['apt'][] = 'git';
				}

				if ( $config['apt'] ) {
					$install_extensions .= " \\\n\t\\\n\t";
					$install_extensions .= "apt-get update; \\\n\t\\\n\tapt-get install -y --no-install-recommends " . implode( ' ', $config['apt'] ) . ";";

					// We need to add some locales for testing.
					if ( array_search( 'locales', $config['apt'], true ) ) {
						$install_extensions .= " \\\n\tsed -i 's/^# *\(\(ru_RU\|fr_FR\|de_DE\|es_ES\|ja_JP\).UTF-8\)/\\1/' /etc/locale.gen;";
						$install_extensions .= " \\\n\tlocale-gen;";
					}
				}

				if ( in_array( 'gd', $config['extensions'], true ) ) {
					$install_extensions .= " \\\n\t\\\n\t";

					if ( version_compare( $version, '7.4' ) >= 0 ) {
						$install_extensions .= "docker-php-ext-configure gd --enable-gd --with-jpeg=/usr;";
					} else {
						$install_extensions .= "docker-php-ext-configure gd --with-png-dir=/usr --with-jpeg-dir=/usr;";
					}
				}

				if ( $config['extensions'] ) {
					$install_extensions .= " \\\n\t\\\n\t";
					$install_extensions .= "docker-php-ext-install " . implode( ' ', $config['extensions'] ) . ";";
				}

				if ( $config['pecl_extensions'] ) {
					$install_extensions .= " \\\n\t\\\n";

					if ( version_compare( $version, '7.4', '>' ) === true ) {
						$install_extensions .= "\tcurl --location --output /usr/local/bin/pickle https://github.com/FriendsOfPHP/pickle/releases/download/v0.6.0/pickle.phar; \\\n";
						$install_extensions .= "\tchmod +x /usr/local/bin/pickle; \\\n\t\\\n";
					}

					$install_extensions .= array_reduce( $config['pecl_extensions'], function ( $command, $extension ) use ( $version ) {
						if ( $command ) {
							$command .= " \\\n";
						}

						if ( version_compare( $version, '7.4', '>' ) === true ) {
							$command .= "\tpickle install $extension;";
						} else {
							$command .= "\tpecl install $extension;";
						}

						if ( 0 === strpos( $extension, 'imagick' ) ) {
							$command .= " \\\n\tdocker-php-ext-enable imagick;";
						}

						return $command;
					}, '' );
				}

				if ( $config['composer'] ) {
					$install_extensions .= " \\\n\t\\\n";
					$install_extensions .= "\tcurl --silent --fail --location --retry 3 --output /tmp/installer.php --url https://getcomposer.org/installer; \\\n";
					$install_extensions .= "\tcurl --silent --fail --location --retry 3 --output /tmp/installer.sig --url https://composer.github.io/installer.sig; \\\n";
					$install_extensions .= "\tphp -r \" \\\n";
					$install_extensions .= "\t\t\\\$signature = file_get_contents( '/tmp/installer.sig' ); \\\n";
					$install_extensions .= "\t\t\\\$hash = hash( 'sha384', file_get_contents('/tmp/installer.php') ); \\\n";
					$install_extensions .= "\t\tif ( \\\$signature !== \\\$hash ) { \\\n";
					$install_extensions .= "\t\t\tunlink( '/tmp/installer.php' ); \\\n";
					$install_extensions .= "\t\t\tunlink( '/tmp/installer.sig' ); \\\n";
					$install_extensions .= "\t\t\techo 'Integrity check failed, installer is either corrupt or worse.' . PHP_EOL; \\\n";
					$install_extensions .= "\t\t\texit( 1 ); \\\n";
					$install_extensions .= "\t\t}\"; \\\n";
					$install_extensions .= "\tphp /tmp/installer.php --no-ansi --install-dir=/usr/bin --filename=composer; \\\n";
					$install_extensions .= "\tcomposer --ansi --version --no-interaction; \\\n";
					$install_extensions .= "\trm -f /tmp/installer.php /tmp/installer.sig;";
				}

				$dockerfile = str_replace( '%%INSTALL_EXTENSIONS%%', $install_extensions, $dockerfile );
			}

			copy( "entrypoint/common.sh", "images/{$version}/{$image}/common.sh" );

		} elseif ( $image === 'phpunit' ) {
			// Replace tags inside the PHPUnit Dockerfile template.
			$dockerfile = str_replace( '%%PHPUNIT_VERSION%%', $config, $dockerfile );
		} elseif ( $image === 'cli' ) {
			// Replace tags inside the WP-CLI Dockerfile template.
			if ( $config ) {
				$dockerfile = preg_replace( '|\n%%OLD_PHP%%.*%%/OLD_PHP%%\n|s', '', $dockerfile );
				$dockerfile = str_replace( '%%MYSQL_CLIENT%%', $config['mysql_client'], $dockerfile );
				$dockerfile = str_replace( '%%DOWNLOAD_URL%%', $config['download_url'], $dockerfile );
			} else {
				// WP-CLI isn't available for this version of PHP.
				$dockerfile = preg_replace( '|\n%%NEW_PHP%%.*%%/NEW_PHP%%\n|s', '', $dockerfile );
			}
		}

		// Cleanup any leftover tags.
		$dockerfile = preg_replace( '/%%[^%]+%%/', '', $dockerfile );

		// Write the real Dockerfile.
		write_file( "images/{$version}/{$image}/Dockerfile", $dockerfile );

		// Copy the entrypoint script, if it exists.
		if ( file_exists( "entrypoint/entrypoint-$image.sh" ) ) {
			copy( "entrypoint/entrypoint-$image.sh", "images/{$version}/{$image}/entrypoint.sh" );
		}

		// Copy the PHP-FPM configuration, if it exists.
		if ( file_exists( "config/php-fpm-$image.conf" ) ) {
			copy( "config/php-fpm-$image.conf", "images/{$version}/{$image}/php-fpm.conf" );
		}

		// Generate the build and push commands for this image/version.
		$build_cmds[ $image ][] = build_commands(
			"{$image} {$version}",
			$image,
			"{$version}",
			$version === $latest
		);

		echo "✅\n";
	}

	foreach ( $phpunit_versions as $phpunit_version => $supported_php_versions ) {
		if ( in_array( $version, $supported_php_versions, true ) ) {
			echo str_pad( "phpunit $phpunit_version", 15, '.' );

			$php_version = $version;

			echo shell_exec( "mkdir -p images/phpunit/{$phpunit_version}-php-{$php_version}" );

			$dockerfile = $templates['phpunit'];

			$dockerfile = str_replace( '%%GENERATED_WARNING%%', $generated_warning, $dockerfile );

			if ( 'latest' === $php_version ) {
				$version_tag = 'latest';
			} else {
				$version_tag = "$php_version-fpm";
			}
			$dockerfile = str_replace( '%%VERSION_TAG%%', $version_tag, $dockerfile );

			$dockerfile = str_replace( '%%PHPUNIT_VERSION%%', $phpunit_version, $dockerfile );

			// Cleanup any leftover tags.
			$dockerfile = preg_replace( '/%%[^%]+%%/', '', $dockerfile );

			// Write the real Dockerfile.
			write_file( "images/phpunit/{$phpunit_version}-php-{$php_version}/Dockerfile", $dockerfile );

			// Copy the entrypoint script, if it exists.
			if ( file_exists( "entrypoint/entrypoint-phpunit.sh" ) ) {
				copy( "entrypoint/entrypoint-phpunit.sh", "images/phpunit/{$phpunit_version}-php-{$php_version}/entrypoint.sh" );
			}

			// Generate the build and push commands for this image/version.
			$build_cmds['phpunit'][] = build_commands(
				"phpunit {$phpunit_version} on php {$php_version}",
				'phpunit',
				"{$phpunit_version}-php-{$php_version}",
				false
			);

			echo "✅\n";
		}
	}

	// Load the .travis.yml template.
	$travis_template = file_get_contents( 'templates/.travis.yml-template' );
	$travis_template = str_replace( '%%GENERATED_WARNING%%', $generated_warning, $travis_template );

	// Generate the YML-formatted list of build commands for each of the images.
	$travis_template = str_replace( '%%BUILD_PHP_IMAGES%%', generate_image_yaml( $build_cmds['php'] ), $travis_template );
	$travis_template = str_replace( '%%BUILD_PHPUNIT_IMAGES%%', generate_image_yaml( $build_cmds['phpunit'] ), $travis_template );
	$travis_template = str_replace( '%%BUILD_CLI_IMAGES%%', generate_image_yaml( $build_cmds['cli'] ), $travis_template );

	write_file( '.travis.yml', $travis_template );
}

/**
 * Generate Docker build commands.
 *
 * @param string $label       The name of the Travis script
 * @param string $image_type  The image type (e.g. php, phpunit, cli)
 * @param string $image_label The image label (e.g. 5.2, etc.). '-fpm' will be added to the end.
 * @param bool   $is_latest   Whether the version is the latest.
 *
 * @return array
 */
function build_commands( $label, $image_type = 'php', $image_label = '7.3', $is_latest = false ) {
	if ( 'phpunit' === $image_type && false !== strpos( $image_label, '-php-' ) ) {
		$path = "images/phpunit/{$image_label}";
	} else {
		$path = "images/{$image_label}/{$image_type}";
	}

	$build = 'docker build --build-arg PACKAGE_REGISTRY=$PACKAGE_REGISTRY --build-arg PR_TAG=$PR_TAG';
	$build .= " -t \$PACKAGE_REGISTRY/{$image_type}:{$image_label}-fpm\$PR_TAG";
	if ( $is_latest ) {
		$build .= " -t \$PACKAGE_REGISTRY/{$image_type}:latest\$PR_TAG";
	}

	$commands = array(
		$label,
		"$build $path",
		'docker images',
		"docker push \$PACKAGE_REGISTRY/{$image_type}:{$image_label}-fpm\$PR_TAG",
	);
	if ( $is_latest ) {
		$commands[] = "docker push \$PACKAGE_REGISTRY/{$image_type}:latest\$PR_TAG";
	}

	return $commands;
}

/**
 * Convert array of build commands into YAML.
 *
 * @param array $build_commands Array of build commands.
 *
 * @return string
 */
function generate_image_yaml( array $build_commands ) {
	return array_reduce(
		$build_commands,
		function ( $string, $cmds ) {
			$name = array_shift( $cmds );
			if ( empty( $string ) ) {
				$string .= "      name: \"$name\"\n";
			} else {
				$string .= "    - name: \"$name\"\n";
			}
			$string .= "      script:\n";
			foreach ( $cmds as $cmd ) {
				$string .= "        - $cmd\n";
			}

			return $string;
		},
		''
	);
}

/**
 * Write file.
 *
 * @param string $file     File path.
 * @param string $contents File contents.
 */
function write_file( $file, $contents ) {
	$fh = fopen( $file, 'w' );
	fwrite( $fh, $contents );
	fclose( $fh );
}
