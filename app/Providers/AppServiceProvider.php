<?php

namespace App\Providers;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Validator;
use ReCaptcha\ReCaptcha;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        //
        Model::unguard();
        Validator::extend('captcha', function ($attribute, $value, $parameters, $validator) {
            $recaptcha = new ReCaptcha(config('services.recaptcha.secret_key'));
            $response = $recaptcha->verify($value);
    
            return $response->isSuccess();
        });
    }
}
