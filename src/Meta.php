<?php
namespace HTML;

class Meta extends HtmlTag
{
    public static function get()
    {
        self::name('meta')->noClosing();
        return parent::get();
    }
}
