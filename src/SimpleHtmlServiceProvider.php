<?php

namespace HTML;

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
        $this->app->bind('htmltag', function() {
            return new HtmlTag();
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
