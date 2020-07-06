<?php
namespace Ardhan\LaravelSimpleHtml;

class Span extends HtmlTag
{
    /**
     * [__construct description]
     * @param [type] $content [description]
     */
    public function __construct($content)
    {
        parent::__construct('span', '', '', $content);
    }
}
