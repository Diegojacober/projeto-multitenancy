<?php

namespace App\Providers;

use App\Models\Post;
use App\Models\Tenant;
use App\Observers\PostObserver;
use App\Observers\TenantObserver;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    public function register()
    {
        //
    }

    public function boot()
    {
        Tenant::observe(TenantObserver::class);
        Post::observe(PostObserver::class);
    }
}
