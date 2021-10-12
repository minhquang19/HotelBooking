<?php

namespace App\Providers;

use App\Repositories\BaseRepository;
use App\Repositories\Admins\Category\CategoryRepoInterface;
use App\Repositories\Admins\Category\CategoryRepo;
use App\Repositories\FrontEnd\Blog\BlogRepo;
use App\Repositories\FrontEnd\Blog\BlogRepoInterface;
use App\Repositories\RepositoryInterface;
use Illuminate\Support\ServiceProvider;

class RepositoryServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind(RepositoryInterface::class, BaseRepository::class);
        $this->app->bind(BlogRepoInterface::class, BlogRepo::class);
        $this->app->bind(CategoryRepoInterface::class, CategoryRepo::class);
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }
}
