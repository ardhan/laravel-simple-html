<?php
namespace Ardhan\LaravelSimpleHtml;

class Element
{
    public function __construct()
    {
    }

    public function Div()
    {
        return new Div();
    }

    public function Span()
    {
        return new Span();
    }
}
