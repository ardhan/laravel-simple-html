<?php
namespace HTML;

class Nav extends HtmlTag
{
    public static function get()
    {
        self::name('nav');
        return parent::get();
    }
}
