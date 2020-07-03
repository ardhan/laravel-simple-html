<?php
namespace HTML;

class Header extends HtmlTag
{
    public static function get()
    {
        self::name('header');
        return parent::get();
    }
}
