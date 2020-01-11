<?php

namespace Stage\Tailwind;

use Illuminate\Support\Arr;

class Config {

    protected $config;
	protected $tailwindConfig;

	/**
	 * Initialize Tailwind
	 *
	 * @param  array $config
	 * @return void
	 */
	public function __construct($config = [])
	{
		$this->config = collect($this->config)->merge($config);
		$this->tailwindConfig = json_decode( file_get_contents( $this->config["cache_path"] ), true );
	}

	/**
	 * Get key from tailwind.json with fallback
	 *
	 * @param null $key
	 * @param null $default
	 *
	 * @return mixed
	 */
    public function get($key = null, $default = null)
    {
        return Arr::get($this->tailwindConfig, $key, $default);
    }

	/**
	 * Return the services config.
	 *
	 * @return array
	 */
	public function config()
	{
		$this->config = $this->app->config->get('tailwind', []);
	}
}