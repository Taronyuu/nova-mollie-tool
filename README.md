# Laravel Nova Mollie Tool
> Simple package to get transactions from Mollie in your Nova dashboard.

 ![Nova Mollie Transactions](https://raw.githubusercontent.com/Taronyuu/nova-mollie-tool/master/screenshot.png)

## Installation

Start with installing the package

`composer require taronyuu/nova-mollie-tool`

Then register the tool inside the `NovaServiceProvider.php`

```php
public function tools()
{
    return [new NovaMollieTool];
}
```

Add these fields to `config/services.php` to make sure Mollie will work.
```php
'nova_mollie_tool'  => [
    'title'     => 'Mollie ',
    'icon'      => null,
    'api_key'   => env('MOLLIE_KEY'),
    'request'   => [
        'limit'     => 20,
    ]
],
```
