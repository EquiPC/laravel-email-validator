# Laravel Email Validator

Validate email addresses in Laravel 5

## Installation

- The package could be installed via Composer

```bash
composer require equipc/laravel-email-validator
```

- If you are using a Laravel version before 5.5, add the service provider and the facade alias to `config/app.php`

```php
'providers' => [
	...
    EquiPC\EmailValidator\EmailValidatorServiceProvider::class,
    ...
]
```

```php
'aliases' => [
    ...
    'EmailValidator' => EquiPC\EmailValidator\EmailValidatorFacade::class,
    ...
]
```

- Add the 'quickemailverification' service configuration to `config/services.php`

```php
'quickemailverification' => [
	'key' => env('QUICKEMAILVERIFICATION_KEY'),
	'sandbox' => env('QUICKEMAILVERIFICATION_SANDBOX', false)
]
```


## Usage

- add the `isValidEmail` rule to the validator

```php
'email' => 'required|email|isValidEmail'
```

## Customizing the error message

If you want to modify the error message, you can publish the lang files with this command:

```bash
php artisan vendor:publish --provider="EquiPC\EmailValidator\EmailValidatorServiceProvider" --tag="lang"
```

This will publish this file to `resources/lang/vendor/emailValidator/en/validation.php`.

```php
 
return [
	"is_invalid_email" => "This email is invalid.",
 ];
 ```
 
 If you want to translate the values to, for example, French, just copy that file over to `resources/lang/vendor/emailValidator/fr/validation.php` and fill in the French translations.
