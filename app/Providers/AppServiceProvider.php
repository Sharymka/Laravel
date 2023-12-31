<?php

namespace App\Providers;

use App\Models\Category;
use App\Models\News;
use App\View\Components\Alert;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\Facades\Blade;
use Illuminate\Support\Facades\Validator;
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
        Paginator::useBootstrapFive();
        Blade::component('alert', Alert::class);

        Validator::extend('exists_in_database', function ($attribute, $value, $parameters, $validator) {
            // Здесь вы можете выполнить проверку наличия значения в базе данных
            // Верните true, если значение существует, и false в противном случае

            return News::query()->where($attribute, $value)->exists();
        });
    }
}
