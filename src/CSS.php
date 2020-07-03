<?php
namespace HTML;

class CSS extends HtmlTag
{
    public static function url($url)
    {
        self::addAttr("href", asset($url));
        return new static;
    }

    public static function get()
    {
        self::name('link')->noClosing()->addAttr("rel", "stylesheet");
        return parent::get();
    }
}
