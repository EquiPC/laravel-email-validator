<?php

namespace EquiPC\EmailValidator;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Validator;
use EquiPC\EmailValidator\EmailValidatorFacade as EmailValidator;

class EmailValidatorServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap the application services.
     */
    public function boot()
    {
        $this->publishes([
            __DIR__.'/../resources/lang' => base_path('resources/lang/vendor/emailValidator'),
        ], 'lang');
        
        $this->publishes([
            __DIR__.'/../config/email-validator.php' => config_path('email-validator.php'),
        ], 'config');

        $this->loadTranslationsFrom(__DIR__.'/../resources/lang', 'emailValidator');

        Validator::extend('isValidEmail', function ($attribute, $value, $parameters, $validator) {
            return EmailValidator::verify($value)->isValid()[0];
        }, trans('emailValidator::validation.is_invalid_email'));
    }

    /**
     * Register the application services
     * @return void
     */
    public function register()
    {
        $this->app->singleton('laravel-email-validator', function () {
            return $this->app->make('EquiPC\EmailValidator\EmailValidator');
        });
    }
}