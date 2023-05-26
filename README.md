<p align="center">
<img src="https://app.freecurrencyapi.com/img/logo/freecurrencyapi.png" width="300"/>
</p>

# freecurrencyapi-php - PHP Free Currency Converter API

[![Latest Version on Packagist](https://img.shields.io/packagist/v/everapi/freecurrencyapi-php.svg?style=flat-square)](https://packagist.org/packages/everapi/freecurrencyapi-php)
[![Total Downloads](https://img.shields.io/packagist/dt/everapi/freecurrencyapi-php.svg?style=flat-square)](https://packagist.org/packages/everapi/freecurrencyapi-php)

This package is a PHP wrapper for [freecurrencyapi.com](https://freecurrencyapi.com), a free currency conversion API, that aims to make the usage of the API as easy as possible in your project.

## Installation

You can install the package via composer:

```bash
composer require everapi/freecurrencyapi-php
```

## Usage

Initialize the API with your API Key (get one for free at [freecurrencyapi.com](https://freecurrencyapi.com)):

```php
$freecurrencyapi = new \FreeCurrencyApi\FreeCurrencyApi\FreeCurrencyApiClient('YOUR-API-KEY');
```

Afterwards you can use the endpoints of the API like this:

```php
echo $freecurrencyapi->latest([
    'base_currency' => 'EUR',
    'currencies' => 'USD',
]);
```

Other available functions / endpoints are:
- `status`
- `currencies`
- `latest`
- `historical`


Learn more about endpoints, parameters and response data structure in the [docs](https://freecurrencyapi.com/docs).

[docs]: https://freecurrencyapi.com/docs
[freecurrencyapi.com]: https://freecurrencyapi.com

## License

The MIT License (MIT). Please see [License File](LICENSE.md) for more information.
