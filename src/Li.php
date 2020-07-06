<?php
namespace Ardhan\LaravelSimpleHtml;

class Li extends HtmlTag
{
    public function __construct($content)
    {
        parent::__construct('li', '', '', $content);
    }
}
