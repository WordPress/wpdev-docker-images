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
 *     @type bool   $gd              Whether or not GD needs to be installed on this image.
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
			'gd'              => false,
			'extensions'      => array(),
			'pecl_extensions' => array(),
		),
		'phpunit' => 3,
		'cli' => false
	),
	'5.3' => array(
		'php' => array(
			'base_name'       => 'devilbox/php-fpm-5.3:latest',
			'gd'              => false,
			'extensions'      => array(),
			'pecl_extensions' => array(),
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
			'gd'              => true,
			'extensions'      => array( 'gd', 'mysql', 'mysqli', 'zip' ),
			'pecl_extensions' => array( 'xdebug-2.4.1' ),
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
			'gd'              => true,
			'extensions'      => array( 'gd', 'mysql', 'mysqli', 'zip' ),
			'pecl_extensions' => array( 'xdebug-2.5.5' ),
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
			'gd'              => true,
			'extensions'      => array( 'gd', 'mysql', 'mysqli', 'zip' ),
			'pecl_extensions' => array( 'xdebug-2.5.5' ),
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
			'gd'              => true,
			'extensions'      => array( 'gd', 'opcache', 'mysqli', 'zip' ),
			'pecl_extensions' => array( 'xdebug-2.7.2' ),
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
			'gd'              => true,
			'extensions'      => array( 'gd', 'opcache', 'mysqli', 'zip' ),
			'pecl_extensions' => array( 'xdebug-2.7.2' ),
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
			'gd'              => true,
			'extensions'      => array( 'gd', 'opcache', 'mysqli', 'zip' ),
			'pecl_extensions' => array( 'xdebug-2.7.2' ),
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
			'gd'              => true,
			'extensions'      => array( 'gd', 'opcache', 'mysqli', 'zip' ),
			'pecl_extensions' => array( 'xdebug-2.7.2' ),
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
			'gd'              => true,
			'extensions'      => array( 'gd', 'opcache', 'mysqli', 'zip' ),
			'pecl_extensions' => array( 'xdebug-2.8.0beta1' ),
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

// Bonus Templates that may be added to the PHP Dockerfile template, when needed.
$install_extensions = <<<EOT
# install the PHP extensions we need
RUN set -ex; \
	\
%%INSTALL_GD%%
	%%EXTENSIONS%% \
	\
%%PECL_EXTENSIONS%%
EOT;

$install_gd = <<<EOT
	apt-get update; \
	\
	apt-get install -y --no-install-recommends \
		libjpeg-dev \
		libpng-dev \
		libzip-dev \
	; \
	\
	docker-php-ext-configure gd --with-png-dir=/usr --with-jpeg-dir=/usr; \
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

			if ( $config['gd'] || $config['extensions'] || $config['pecl_extensions'] ) {
				$dockerfile = str_replace( '%%INSTALL_EXTENSIONS%%', $install_extensions, $dockerfile );
			}

			if ( $config['gd'] ) {
				$dockerfile = str_replace( '%%INSTALL_GD%%', $install_gd, $dockerfile );
			}

			if ( $config['extensions'] ) {
				$extensions = 'docker-php-ext-install ' . implode( $config['extensions'], ' ' ) . ";";
				$dockerfile = str_replace( '%%EXTENSIONS%%', $extensions, $dockerfile );
			}

			if ( $config['pecl_extensions'] ) {
				$pecl_extensions = array_reduce( $config['pecl_extensions'], function ( $command, $extension ) {
					if ( $command ) {
						$command .= "\\\n";
					}

					return "$command\tpecl install $extension;";
				}, '' );

				$dockerfile = str_replace( '%%PECL_EXTENSIONS%%', $pecl_extensions, $dockerfile );
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
		$build_cmd = "docker build -t \$PACKAGE_REGISTRY/$image:$version-fpm\$PR_TAG";
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
