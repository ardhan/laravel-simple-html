<?php
namespace Ardhan\LaravelSimpleHtml;

class Meta extends HtmlTag
{
    /**
     * [__construct description]
     */
    public function __construct($name, $description)
    {
        parent::__construct('meta');
        $this->attr("name", $name)
            ->attr("content", $description)
            ->noClosing();
    }
}
