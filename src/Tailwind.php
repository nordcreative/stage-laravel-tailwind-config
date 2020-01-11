<?php

namespace Stage\LaravelTailwindConfig;

use Illuminate\Support\Arr;
use function \Roots\config;

class Tailwind {

    protected $config;
	protected $tailwindValues;

	/**
	 * Initialize Tailwind
	 *
	 * @param  array $config
	 * @return void
	 */
	public function __construct($config = [])
	{
		$this->config = collect($this->config)->merge($config);
		$this->tailwindValues = json_decode(file_get_contents($this->config('cache_path')), true);
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
        return Arr::get($this->tailwindValues, $key, $default);
    }

	/**
	 * Get config from tailwind.json
	 *
	 * @param $key
	 *
	 * @return mixed|\Roots\Acorn\Config
	 */
    public function config( $key ) {
		return config( 'tailwind.'. $key );
    }
}