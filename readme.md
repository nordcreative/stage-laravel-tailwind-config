# Laravel Tailwind Config

This is a fork form [approvedio/laravel-mix-export-tailwind-config](https://github.com/approvedio/laravel-mix-export-tailwind-config) to use with [Roots Sage](https://roots.io/sage) > 10).
The original author [Michael Boffey](https://github.com/boffey) described it like this:

"I've recently found myself using Tailwind more and more but have run into a few situations where I need to access tailwind config values within my blade templates. The most recent event occurred when building a admin section and i needed to access a color defined within the tailwind config file to pass to a charting library. Instead of hardcoding the value I decided to create this library."

## Installation

```bash
composer require ouun/laravel-tailwind-config
```

### Publish Config

```
$  wp acorn vendor:publish --provider="Stage\Tailwind\TailwindServiceProvider"
```

The application service provider and facade will be automatically registered for you.

Or add the service provider to your app.php config file

```php
Stage\Tailwind\TailwindServiceProvider::class,
```

Optionally you can add the facade to the Aliases section of your app.php config file

```php
'Tailwind' => Stage\Tailwind\Facades\Tailwind::class
```

## Usage

You can use the facade

```php
Tailwind::get('colors.red-light', '#FF0000');
```

You can use the helper method

```php
tailwind('colors.red-light', '#FF0000');
```

## Config

By default we assume your tailwind config file is called tailwind.json in the `/dist folder of your project. you can override this configuration by publishing the config and updating the path to your tailwind.json file.

```php
'cache_path' => base_path('dist/tailwind.json'),
```

To generate the tailwind.json file from your config you will either need to use a Webpack export package such as [this one](https://github.com/approvedio/laravel-mix-export-tailwind-config) or add the following Mix extension to your webpack.mix.js:

```js
mix.extend('exportTailwindConfig', function(webpackConfig, configPath = './tailwind.js') {
    let fs = require('fs');
    let config = require(configPath);
    let json = JSON.stringify(config, null, 2);

    fs.writeFile('./tailwind.json', json);
});
```
And then call the following mix function to generate this file

```js
mix.exportTailwindConfig('./tailwind.js');
```
