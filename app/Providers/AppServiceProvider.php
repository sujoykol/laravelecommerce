<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Pagination\Paginator;

use App\Models\Category;
use App\Observers\CategoryObserver;
use App\Models\Product;
use App\Observers\ProductObserver;
use App\Models\Page;
use App\Observers\PageObserver;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        Paginator::useBootstrap();
        Category::observe(CategoryObserver::class);
        Product::observe(ProductObserver::class);
        Page::observe(PageObserver::class);
    }
}
