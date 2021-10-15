<?php

namespace App\Providers;

use App\Repositories\Admins\Category\CategoryRepo;
use App\Repositories\Admins\Category\CategoryRepoInterface;
use http\Url;
use Illuminate\Support\Facades\App;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->singleton(
            CategoryRepoInterface::class,
            CategoryRepo::class
        );
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        if (App::environment('production')) {
            \URL::forceScheme('https');
        }
    }
}
