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
        Validator::extend('isValidEmail', function ($attribute, $value, $parameters, $validator) {
            return EmailValidator::verify($value)->isValid()[0];
        }, 'This email is invalid');
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