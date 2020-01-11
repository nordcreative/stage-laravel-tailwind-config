<?php

namespace Stage\Tailwind;

use Illuminate\Contracts\Container\BindingResolutionException;
use Roots\Acorn\ServiceProvider;

class TailwindServiceProvider extends ServiceProvider {

	/**
	 * Register any application services.
	 *
	 * @return void
	 */
	public function register() {
		$this->app->singleton(
			'Stage\Tailwind\Config',
			function () {
				return new Config(
					$this->config()
				);
			}
		);
	}

	/**
	 * Bootstrap any application services.
	 *
	 * @return void
	 * @throws BindingResolutionException
	 */
	public function boot()
	{
		$this->publishes([
			__DIR__ . '/../config/tailwind.php' => $this->app->configPath('tailwind.php'),
		]);

		$this->app->make('Stage\Tailwind\Config');
	}

	/**
	 * Return the services config.
	 *
	 * @return array
	 */
	public function config()
	{
		return $this->app->config->get('tailwind', []);
	}

}
