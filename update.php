<?php

// The latest stable version of PHP that is supported in WordPress trunk.
$latest = '7.3';

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
			'apt'             => array(),
			'extensions'      => array(),
			'pecl_extensions' => array(),
			'composer'        => false,
		),
		'phpunit' => 3,
		'cli' => false,
	),
	'5.3' => array(
		'php' => array(
			'base_name'       => 'devilbox/php-fpm-5.3:latest',
			'apt'             => array( 'unzip' ),
			'extensions'      => array(),
			'pecl_extensions' => array(),
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
			'apt'             => array( 'libjpeg-dev', 'libpng-dev', 'libzip-dev', 'libmemcached-dev', 'unzip', 'libmagickwand-dev' ),
			'extensions'      => array( 'gd', 'mysql', 'mysqli', 'zip' ),
			'pecl_extensions' => array( 'xdebug-2.4.1', 'memcached-2.2.0', 'imagick-3.4.4' ),
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
			'apt'             => array( 'libjpeg-dev', 'libpng-dev', 'libzip-dev', 'libmemcached-dev', 'unzip', 'libmagickwand-dev' ),
			'extensions'      => array( 'gd', 'mysql', 'mysqli', 'zip' ),
			'pecl_extensions' => array( 'xdebug-2.5.5', 'memcached-2.2.0', 'imagick-3.4.4' ),
			'composer'        => true,
		),
		'phpunit' => 4,
		'cli' => array(
			'mysql_client' => 'mysql-client',
			'download_url' => 'https://raw.githubusercontent.com/wp-cli/builds/gh-pages/phar/wp-cli.phar',
		),
	),
	'5.6' => array(
		'php' => array(
			'base_name'       => 'php:5.6-fpm',
			'apt'             => array( 'libjpeg-dev', 'libpng-dev', 'libzip-dev', 'libmemcached-dev', 'unzip', 'libmagickwand-dev' ),
			'extensions'      => array( 'gd', 'mysql', 'mysqli', 'zip' ),
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
			'apt'             => array( 'libjpeg-dev', 'libpng-dev', 'libzip-dev', 'libmemcached-dev', 'unzip', 'libmagickwand-dev' ),
			'extensions'      => array( 'gd', 'opcache', 'mysqli', 'zip' ),
			'pecl_extensions' => array( 'xdebug-2.7.2', 'memcached-3.1.3', 'imagick' ),
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
			'apt'             => array( 'libjpeg-dev', 'libpng-dev', 'libzip-dev', 'libmemcached-dev', 'unzip', 'libmagickwand-dev' ),
			'extensions'      => array( 'gd', 'opcache', 'mysqli', 'zip' ),
			'pecl_extensions' => array( 'xdebug-2.7.2', 'memcached-3.1.3', 'imagick' ),
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
			'apt'             => array( 'libjpeg-dev', 'libpng-dev', 'libzip-dev', 'libmemcached-dev', 'unzip', 'libmagickwand-dev' ),
			'extensions'      => array( 'gd', 'opcache', 'mysqli', 'zip' ),
			'pecl_extensions' => array( 'xdebug-2.7.2', 'memcached-3.1.3', 'imagick' ),
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
			'apt'             => array( 'libjpeg-dev', 'libpng-dev', 'libzip-dev', 'libmemcached-dev', 'unzip', 'libmagickwand-dev' ),
			'extensions'      => array( 'gd', 'opcache', 'mysqli', 'zip' ),
			'pecl_extensions' => array( 'xdebug-2.7.2', 'memcached-3.1.3', 'imagick' ),
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
			'base_name'       => 'php:7.4-rc-fpm',
			'apt'             => array( 'libjpeg-dev', 'libpng-dev', 'libzip-dev', 'libmemcached-dev', 'unzip', 'libmagickwand-dev' ),
			'extensions'      => array( 'gd', 'opcache', 'mysqli', 'zip' ),
			'pecl_extensions' => array( 'xdebug-2.8.0beta1', 'memcached-3.1.3', 'imagick' ),
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
			'base_name'       => 'devilbox/php-fpm-8.0:latest',
			'apt'             => array( 'unzip' ),
			'extensions'      => array( 'mysqli' ),
			'pecl_extensions' => array(),
			'composer'        => true,
		),
		'phpunit' => 7,
		'cli' => array(
			'mysql_client' => 'virtual-mysql-client',
			'download_url' => 'https://raw.githubusercontent.com/wp-cli/builds/gh-pages/phar/wp-cli.phar',
		),
	),
);

// A warning that will be added to each Dockerfile, to ensure folks don't edit them directly.
$generated_warning = <<<EOT
##########################################################################
#
# WARNING: This file was generated by update.php. Do not edit it directly.
#
#
EOT;

// Load the templates.
$templates = array(
	'php'     => file_get_contents( 'Dockerfile-php.template' ),
	'phpunit' => file_get_contents( 'Dockerfile-phpunit.template' ),
	'cli'     => file_get_contents( 'Dockerfile-cli.template' ),
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
		echo str_pad( $image, 10, '.' );
		echo shell_exec( "mkdir -p $version/$image" );

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

				if ( $config['apt'] ) {
					$install_extensions .= " \\\n\t\\\n\t";
					$install_extensions .= "apt-get update; \\\n\t\\\n\tapt-get install -y --no-install-recommends " . implode( $config['apt'], ' ' ) . ";";
				}

				if ( in_array( 'gd', $config['extensions'], true ) ) {
					$install_extensions .= " \\\n\t\\\n\t";
					$install_extensions .= "docker-php-ext-configure gd --with-png-dir=/usr --with-jpeg-dir=/usr;";
				}

				if ( $config['extensions'] ) {
					$install_extensions .= " \\\n\t\\\n\t";
					$install_extensions .= "docker-php-ext-install " . implode( $config['extensions'], ' ' ) . ";";
				}

				if ( $config['pecl_extensions'] ) {
					$install_extensions .= " \\\n\t\\\n";
					$install_extensions .= array_reduce( $config['pecl_extensions'], function ( $command, $extension ) {
						if ( $command ) {
							$command .= " \\\n";
						}

						$command .= "\tpecl install $extension;";

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
		$fh = fopen( "$version/$image/Dockerfile", 'w' );
		fwrite( $fh, $dockerfile );
		fclose( $fh );

		// Copy the entrypoint script, if it exists.
		if ( file_exists( "entrypoint-$image.sh" ) ) {
			copy( "entrypoint-$image.sh", "$version/$image/entrypoint.sh" );
		}

		// Generate the build and push commands for this image/version.
		$build_cmd  = "docker build --build-arg PACKAGE_REGISTRY=\$PACKAGE_REGISTRY --build-arg PR_TAG=\$PR_TAG";
		$build_cmd .= " -t \$PACKAGE_REGISTRY/$image:$version-fpm\$PR_TAG";
		if ( $version === $latest ) {
			$build_cmd .= " -t \$PACKAGE_REGISTRY/$image:latest\$PR_TAG";
		}
		$build_cmd_list = array(
			"$image $version",
			"$build_cmd $version/$image",
			'docker images',
			"docker push \$PACKAGE_REGISTRY/$image:$version-fpm\$PR_TAG",
		);
		if ( $version === $latest ) {
			$build_cmd_list[] = "docker push \$PACKAGE_REGISTRY/$image:latest\$PR_TAG";
		}

		$build_cmds[ $image ][] = $build_cmd_list;

		echo "✅\n";
	}

	// Load the .travis.yml template.
	$travis_template = file_get_contents( '.travis.yml-template' );
	$travis_template = str_replace( '%%GENERATED_WARNING%%', $generated_warning, $travis_template );

	// Generate the YML-formatted list of build commands for each of the images.
	foreach ( array( 'php', 'phpunit', 'cli' ) as $image ) {
		$build_strings[ $image ] = array_reduce( $build_cmds[ $image ], function( $string, $cmds ) use ( $image ) {
			$name = array_shift( $cmds );
			if ( $string === '' && $image !== 'cli' ) {
				$string .= "      name: \"$name\"\n";
			} else {
				$string .= "    - name: \"$name\"\n";
			}
			$string .= "      script:\n";
			foreach( $cmds as $cmd ) {
				$string .= "        - $cmd\n";
			}

			return $string;
		}, '' );
	}
	$travis_template = str_replace( '%%BUILD_PHP_IMAGES%%', $build_strings['php'], $travis_template );
	$travis_template = str_replace( '%%BUILD_PHPUNIT_IMAGES%%', $build_strings['phpunit'], $travis_template );
	$travis_template = str_replace( '%%BUILD_CLI_IMAGES%%', $build_strings['cli'], $travis_template );

	$fh = fopen( ".travis.yml", 'w' );
	fwrite( $fh, $travis_template );
	fclose( $fh );
}
