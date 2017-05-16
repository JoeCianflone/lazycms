<?php

namespace App\Providers;

use App\Transformers\PostTrasnformer;
use App\Transformers\TweetTransformer;
use App\Transformers\GithubTransformer;
use Illuminate\Support\ServiceProvider;

class TransformerServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap the application services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }

    /**
     * Register the application services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->singleton('TweetTransformer', TweetTransformer::class);
        $this->app->singleton('PostTransformer', PostTransformer::class);
        $this->app->singleton('PageTransformer', PostTransformer::class);
        $this->app->singleton('GithubTransformer', GithubTransformer::class);
    }
}
