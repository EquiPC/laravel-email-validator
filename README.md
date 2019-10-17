# Laravel Email Validator

Validate email addresses in Laravel 5

## Installation

- The package could be installed via Composer

```bash
composer require equipc/laravel-email-validator
```

- Publish the configuration file using the command below

```bash
php artisan vendor:publish --provider="EquiPC\EmailValidator\EmailValidatorServiceProvider" --tag="config"
```

- Configure your Quick Email Verification key in your `.env` file. You can retrieve this API key from the Quick Email Verification control panel.

```
QUICKEMAILVERIFICATION_KEY=your-api-key
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

## Sandbox mode

You can enable sandbox mode in your `.env` file

```
QUICKEMAILVERIFICATION_SANDBOX=true
```