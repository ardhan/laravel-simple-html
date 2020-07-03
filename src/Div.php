<?php
namespace HTML;

class Div extends HtmlTag
{
    public static function get()
    {
        self::name('div');
        return parent::get();
    }
}
