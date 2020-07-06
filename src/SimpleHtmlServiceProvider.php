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
        $this->app->bind('htmltag', function() {
            return new HtmlTag();
        });

        $this->app->bind('div', function() {
            return new Div();
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
