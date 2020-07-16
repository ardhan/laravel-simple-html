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
    public function Meta($name, $value)
    {
        $meta = new HtmlTag('meta');
        $meta->noClosing()->attr("name", $name)->attr("content", $value);
        return $meta;
    }


    /**
     * [Div description]
     */
    public function Div()
    {
        return new HtmlTag('div');
    }


    /**
     * [Div description]
     */
    public function Nav()
    {
        return new HtmlTag('nav');
    }


    /**
     * [Span description]
     */
    public function Span()
    {
        return new HtmlTag('span');
    }


    /**
     * [A description]
     */
    public function A($text, $url)
    {
        $a = new HtmlTag('a', $text);
        $a->attr("href", $url);
        return $a;
    }


    /**
     * [Li description]
     * @param [type] $text [description]
     */
    public function Li($text)
    {
        return new HtmlTag('li', $text);
    }


    /**
     * [Ls description]
     */
    public function Ls()
    {
        return new Ls();
    }


    /**
     * [P description]
     * @param [type] $text [description]
     */
    public function P($text)
    {
        return new HtmlTag('p', $text);
    }


    /**
     * [H1 description]
     * @param [type] $text [description]
     */
    public function H1($text)
    {
        return new HtmlTag('h1', $text);
    }


    /**
     * [H2 description]
     * @param [type] $text [description]
     */
    public function H2($text)
    {
        return new HtmlTag('h2', $text);
    }


    /**
     * [H3 description]
     * @param [type] $text [description]
     */
    public function H3($text)
    {
        return new HtmlTag('h3', $text);
    }


    /**
     * [H4 description]
     * @param [type] $text [description]
     */
    public function H4($text)
    {
        return new HtmlTag('h4', $text);
    }


    /**
     * [H5 description]
     * @param [type] $text [description]
     */
    public function H5($text)
    {
        return new HtmlTag('h5', $text);
    }


    /**
     * [H5 description]
     * @param [type] $text [description]
     */
    public function H6($text)
    {
        return new HtmlTag('h6', $text);
    }


    /**
     * [Table description]
     */
    public function Table()
    {
        return new Table();
    }


    /**
     * membuat tr
     * @param  [type] $content [description]
     * @return [type]          [description]
     */
    public function tr($content = '')
    {
        return new HtmlTag('tr', $content);
    }


    /**
     * membuat td
     * @param  [type] $content [description]
     * @return [type]          [description]
     */
    public function td($content = '')
    {
        return new HtmlTag('td', $content);
    }


    /**
     * [Form description]
     */
    public function Form($action = "", $method = "POST")
    {
        return new Form($action, $method);
    }


    /**
     * [Input description]
     */
    public function Input($type = '', $name = '', $value = '')
    {
        $input = new HtmlTag('input');
        $input->attr("name", $name)->attr("value", $value);
        return $input;
    }


}
