<?php
namespace Ardhan\LaravelSimpleHtml;

class Element
{
    public function __construct()
    {
    }

    public function Meta() {
        $meta = new HtmlTag('meta');
        $meta->noClosing();
        return $meta; 
    }

    public function Div() { return new Div(); }

    public function Span() { return new Span(); }

    public function Li() { return new Li(); }

    public function Ul() { return new Ul(); }

    public function A() { return new A(); }

    public function P() { return new P(); }

    public function H1() { return new H1(); }

    public function H2() { return new H2(); }

    public function H3() { return new H3(); }

    public function H4() { return new H4(); }

    public function H5() { return new H5(); }

    public function H6() { return new H6(); }

    public function Table() { return new Table(); }

    public function Thead() { return new Thead(); }

    public function Tbody() { return new Tbody(); }

    public function Tr() { return new Tr(); }

    public function Td() { return new Td(); }

}
