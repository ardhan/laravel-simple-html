<?php
namespace Ardhan\LaravelSimpleHtml;

class Meta extends HtmlTag
{
    /**
     * [__construct description]
     */
    public function __construct()
    {
        parent::__construct('meta');
        $this->noClosing();
    }
}
