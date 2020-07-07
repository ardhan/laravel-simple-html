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
    public function Meta($name, $value) {
        $meta = new HtmlTag('meta');
        $meta->noClosing()->attr("name", $name)->attr("content", $value);
        return $meta;
    }


    /**
     * [Div description]
     */
    public function Div() {
        return new HtmlTag('div');
    }


    /**
     * [Span description]
     */
    public function Span() {
        return new Span();
    }

    public function Li() {
        return new HtmlTag('li');
    }

    public function Ul() {
        return new HtmlTag('ul');
    }

    public function A() {
        return new HtmlTag('a');
    }

    public function P($text) {
        return new P();
    }

    public function H1($text) {
        return new HtmlTag('h1');
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
