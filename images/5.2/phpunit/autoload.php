<?php
/**
 * PHP 5.2 compatible autoloader for the PHPUnit 3.6 dependency packages.
 *
 * The Autoload.php of File_Iterator, PHP_CodeCoverage, PHP_Timer, PHP_Token_Stream, Text_Template and
 * PHPUnit_MockObject registers its autoloader with a closure, which is PHP 5.3 syntax and does not parse
 * on PHP 5.2. The Dockerfile copies this file over each of them. It maps PEAR-style class names
 * (PHP_Timer_Foo) to files (PHP/Timer/Foo.php) found on the include path.
 */

if ( ! function_exists( 'wpdev_phpunit_autoload' ) ) {
	function wpdev_phpunit_autoload( $class ) {
		if ( ! preg_match( '/^(File_|PHP_|Text_|PHPUnit_Framework_MockObject)/', $class ) ) {
			return;
		}

		$parts = explode( '_', $class );
		while ( $parts ) {
			$file = implode( '/', $parts ) . '.php';
			foreach ( explode( PATH_SEPARATOR, get_include_path() ) as $dir ) {
				if ( is_file( $dir . '/' . $file ) ) {
					require_once $dir . '/' . $file;
					return;
				}
			}

			// Classes such as PHP_Token_Whitespace are all defined in PHP/Token.php.
			array_pop( $parts );
		}
	}

	spl_autoload_register( 'wpdev_phpunit_autoload' );
}

/*
 * PHPUnit_Util_GlobalState::phpunitFiles() calls one function per package that the original Autoload.php
 * defines, to list the package's files and hide them from stack traces. Returning no files only means
 * that frames from those packages are not filtered out of traces.
 */
if ( ! function_exists( 'file_iterator_autoload' ) ) {
	function file_iterator_autoload() {
		return array();
	}
}
if ( ! function_exists( 'php_codecoverage_autoload' ) ) {
	function php_codecoverage_autoload() {
		return array();
	}
}
if ( ! function_exists( 'php_timer_autoload' ) ) {
	function php_timer_autoload() {
		return array();
	}
}
if ( ! function_exists( 'php_tokenstream_autoload' ) ) {
	function php_tokenstream_autoload() {
		return array();
	}
}
if ( ! function_exists( 'phpunit_mockobject_autoload' ) ) {
	function phpunit_mockobject_autoload() {
		return array();
	}
}
if ( ! function_exists( 'text_template_autoload' ) ) {
	function text_template_autoload() {
		return array();
	}
}
