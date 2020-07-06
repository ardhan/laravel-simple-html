<?php
namespace HTML\Facades;

use Illuminate\Support\Facades\Facade;

class HtmlTag extends Facade
{
    protected static function getFacadeAccessor()
    {
        return 'htmltag';
    }
}
