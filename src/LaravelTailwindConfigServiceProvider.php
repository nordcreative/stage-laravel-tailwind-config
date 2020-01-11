<?php

namespace Stage\LaravelTailwindConfig;

use Illuminate\Support\ServiceProvider;

use function \Roots\config_path;
use function \Roots\config;

class LaravelTailwindConfigServiceProvider extends ServiceProvider {

	/**
	 * Register the service provider.
	 *
	 * @return void
	 */
	public function register() {

		$this->registerTailwindService();

		if ( $this->app->runningInConsole() ) {
			$this->registerResources();
		}
	}

	/**
	 * Register provider.
	 *
	 * @return void
	 */
	public function registerTailwindService() {
		$this->app->singleton(
			'tailwind',
			function ( $app ) {
				return new Tailwind(
					config( 'tailwind', array() )
				);
			}
		);
	}

	/**
	 * Register resources.
	 *
	 * @return void
	 */
	public function registerResources() {
		$this->mergeConfigFrom(
			__DIR__ . '/../config/tailwind.php',
			'tailwind'
		);

		$this->publishes(
			array(
				__DIR__ . '/../config/tailwind.php' => config_path( 'tailwind.php' ),
			)
		);
	}
}
