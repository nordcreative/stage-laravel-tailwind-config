<?php

use Roots\Acorn\Application;
use function Roots\app;

if ( ! function_exists( 'tailwind' ) ) {
	/**
	 * Get Tailwind config from tailwind.json
	 *
	 * @param null $key
	 * @param null $default
	 *
	 * @return mixed|Application
	 */
	function tailwind( $key = null, $default = null ) {

		if ( is_null( $key ) ) {
			return app( 'Stage\Tailwind\Config' );
		}

		return app( 'Stage\Tailwind\Config' )->get( $key, $default );
	}
}
