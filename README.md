Mailblade
=========

Mailblade lets you manage your email templates easily and without hassle.
You can use the powerful Blade templating engine inside your emails.

## Install it
Via Laravel's very own **artisan** tool:  
```
php artisan bundle:install mailblade
```

### Activate it
Go into you `application/bundles.php` file and add this line to your *bundles* array:

```php
'mailblade' => array('auto' => true)
```

## Usage
*Mailblade* is usable out of the box.  
You handle it as you handle any view in Laravel:

```php
$message = Mailblade::make('password-restore');
$message->with('email', 'email@somewhere.com');
```

To see the html version of a template simply do:

```php
$html = Mailblade->html();
```

For the text version:

```php
$txt = Mailblade->text();
```