# About Laravel-Gimmeproxy

Laravel package for easy integration with the GimmeProxy API. It allows you to use the GimmeProxy API in your Laravel
applications.

- [Laravel](https://laravel.com/)
- [GimmeProxy](https://gimmeproxy.com/)
- [Schottstaedt](https://www.schottstaedt.net/)

## Installation

You can install the package via composer:

```bash
composer require xchimx/laravel-gimmeproxy
```

## Usage

### Using the Facade

You can use the provided GimmeProxy facade:

```php
use Xchimx\GimmeProxy\Facades\GimmeProxy;

class GimmeProxyController extends Controller
{
    public function getProxy()
    {
        return GimmeProxy::getProxy([
            'amount' => 5,
            'api_key' => 'YOUR-API-KEY', //but you don't need any
            'maxCheckPeriod' => 600,
            'protocol' => 'http',
            'anonymityLevel' => 1,
            'user-agent' => true,
            'ipPort' => 'true',
        ]);
    }
}
```
## Features

- The Amount parameter is from the package itself. This controls the quantity.
- Duplicate proxies are sorted out.
- The output is stopped when no more new proxies are available.
 
## All Parameters

- [Parameters](https://gimmeproxy.com/#how)

## License

This package is released under the MIT License.
