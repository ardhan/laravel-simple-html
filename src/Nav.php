<?php
namespace Ardhan\LaravelSimpleHtml;

class Nav extends HtmlTag
{
    public static function get()
    {
        self::name('nav');
        return parent::get();
    }
}
