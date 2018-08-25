# Laravel Nova Mollie Tool

Add these fields to `config/services.php` to make sure Mollie will work.
```
    'nova_mollie_tool'  => [
        'title'     => 'Mollie ',
        'icon'      => null,
        'api_key'   => env('MOLLIE_KEY'),
        'request'   => [
            'limit'     => 20,
        ]
    ],
```
