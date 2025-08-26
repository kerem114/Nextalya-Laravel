<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Modules\Community\Interfaces\CommunityRepositoryInterface;
use Modules\Community\Repositories\CommunityRepository;
use Modules\Poll\Interfaces\PollRepositoryInterface;
use Modules\Poll\Repositories\PollRepository;
use Modules\Post\Interfaces\PostRepositoryInterface;
use Modules\Post\Repositories\PostRepository;
use Modules\Product\Interfaces\ProductManualRepositoryInterface;
use Modules\Product\Interfaces\ProductRepositoryInterface;
use Modules\Product\Repositories\ProductManualRepository;
use Modules\Product\Repositories\ProductRepository;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        $this->app->bind(PostRepositoryInterface::class, PostRepository::class);
        $this->app->bind(PollRepositoryInterface::class, PollRepository::class);
        $this->app->bind(ProductRepositoryInterface::class, ProductRepository::class);
        $this->app->bind(ProductManualRepositoryInterface::class, ProductManualRepository::class);
        $this->app->bind(CommunityRepositoryInterface::class, CommunityRepository::class);
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        //
    }
}
