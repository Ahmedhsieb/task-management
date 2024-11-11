<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Str;

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
        Route::macro('resourceWithTrashed', function ($name, $controller) {
            Route::resource($name, $controller);
    
            // Generate route names automatically from resource name
            $singularName = Str::singular($name);
    
            // Restore Route
            Route::patch("{$name}/{{$singularName}}/restore", [$controller, 'restore'])
                ->name("{$name}.restore");
    
            // Force Delete Route
            Route::delete("{$name}/{{$singularName}}/forceDelete", [$controller, 'forceDelete'])
                ->name("{$name}.forceDelete");
        });
    }
}
