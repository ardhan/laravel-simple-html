<?php
namespace Ardhan\LaravelSimpleHtml;

class Element
{
    public function __construct()
    {
    }

    public function Div(){ return new Div(); }
    public function Span() { return new Span(); }
    public function Li() { return new Li(); }
    public function Ul() { return new Ul(); }
    public function A() { return new A(); }
    public function H1() { return new H1(); }
}
