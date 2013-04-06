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
$message->with('email', 'example@email.com')
$message->with('key', 'Fhgns7396&-21dj');
```

Or even like this:

```php
$input = array(
  'email' => 'example@email.com',
  'key'   => 'Fhgns7396&-21dj'
);

$message = Mailblade::make('password-restore', $input);
```

To see the html version of a template simply do:

```php
$html = Mailblade->html();
```

For the text version:

```php
$txt = Mailblade->text();
```

## Configuration
Mailblade views are different to your *'regular'* Laravel Views in two ways:

1. You choose the default folder for your templates.
2. They are language-aware

Let us explain...

### 1. The template directory
Views in laravel usually follow a convention: They have to be placed inside your `application/views` directory
or inside your `[bundle]/views` directory in case of bundles.  
With Mailblade that is **not the case**. There are no conventions and you **choose in which folder your template files will be located**.

That being said though, Mailblade does provide a default option, which is inside the `mailblade/templates` folder.

### 2. Language-aware
Mailblade chooses the appropriate template based on your application language.  
Make sure you follow this convention when placing your files:  

```php
[template_dir]/[language]/[template_name].blade.php
```

So, for example, the english version of the *'contact-message'* template sould be placed like this:

```php
mailblade/templates/en/contact-message
```
