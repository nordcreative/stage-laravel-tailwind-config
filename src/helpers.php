<?php

use Stage\LaravelTailwindConfig\Tailwind;

use function Roots\app;

if ( ! function_exists( 'tailwind' ) ) {
	function tailwind( $key = null, $default = null ) {
		if ( is_null( $key ) ) {
			return app( 'tailwind' );
		}

		return app( 'tailwind' )->get( $key, $default );
	}
}
