# Laravel Nova Mollie Tool

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
