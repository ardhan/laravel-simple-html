<?php
namespace Ardhan\LaravelSimpleHtml;

class Div extends HtmlTag
{
    /**
     * [__construct description]
     */
    public function __construct($content = '')
    {
        parent::__construct('div', '', '', $content);
    }
}
