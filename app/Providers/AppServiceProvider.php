<?php

namespace App\Providers;

use Illuminate\Support\Facades\Validator;
use DateTime;
use Illuminate\Support\ServiceProvider;

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
        Validator::extend('without_spaces', function ($attr, $value) {
            return preg_match('/^\S*$/u', $value);
        });

        Validator::extend('olderThan', function ($attribute, $value, $parameters) {
            $minAge = (!empty($parameters)) ? (int) $parameters[0] : 15;
            return (new DateTime)->diff(new DateTime($value))->y >= $minAge;

            // or the same using Carbon:
            // return Carbon\Carbon::now()->diff(new Carbon\Carbon($value))->y >= $minAge;
        });

        Validator::extend('youngerThan', function ($attribute, $value, $parameters) {
            $minAge = (!empty($parameters)) ? (int) $parameters[0] : 80;
            return (new DateTime)->diff(new DateTime($value))->y <= $minAge;

            // or the same using Carbon:
            // return Carbon\Carbon::now()->diff(new Carbon\Carbon($value))->y >= $minAge;
        });
    }
}
