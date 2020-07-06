<?php

namespace Ardhan\LaravelSimpleHtml;

use Illuminate\Support\ServiceProvider;

class SimpleHtmlServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {

        $this->app->bind('page', function() {
            return new Page();
        });

        $this->app->bind('element', function() {
            return new Element();
        });
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {

    }
}
