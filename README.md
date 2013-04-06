Mailblade
=========

Mailblade is a Laravel plugin that lets you manage your email templates in Laravel easily and without hassle.
You can use the powerful Blade templating engine inside your emails for your html templates.  
**IMPORTANT:** For the text version of the templates we stick with regular php.

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
By default, Mailblade chooses your email template from the `mailblade/views`folder.  
You can **choose any folder you want for your template files** by going into `mailblade/config/options.php` file.


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

## Give me some templates
The best thing about Mailblade is that it comes with templates for sending commonly used email messages, like:

* Contact form
* Password restore
* User confirmations

You can even preview the messages if you do something like this in your routes files:

```php
Route::get('preview', function()
{
  return Mailblade::make('your-template')->html();
}
```

Or for the text version

```php
Route::get('preview', function()
{
  return Mailblade::make('your-template')->text();
}
```

**Note:** *(Templates are on the way and will be pushed soon)*
