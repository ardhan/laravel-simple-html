<?php
namespace Ardhan\LaravelSimpleHtml;

class Element
{
    public function __construct()
    {
    }

    public function Tag($tag)
    {
        return new HtmlTag($tag);
    }


    /**
     * [Meta description]
     */
    public function Meta() {
        return new Meta();
    }


    /**
     * [Div description]
     */
    public function Div() {
        return new Div();
    }


    /**
     * [Span description]
     */
    public function Span() {
        return new Span();
    }

    public function Li() { return new Li(); }

    public function Ul() { return new Ul(); }

    public function A() { return new A(); }

    public function P($text) {
        return new P();
    }

    public function H1($text) {
        return new H1();
    }

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
