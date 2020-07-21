<?php
namespace Ardhan\LaravelSimpleHtml;

class Element
{

    /**
     * contruct class
     */
    public function __construct()
    {
    }


    /**
     * Creating html tag
     * @param string
     */
    public function Tag($tag)
    {
        return new HtmlTag($tag);
    }


    /**
     * insert script
     */
    public function script($content = '')
    {
        $script = new HtmlTag('script');
        $script->content($content);
        return $script;
    }


    /**
     * Meta
     * @param string $name
     * @param string $value
     */
    public function Meta($name, $value)
    {
        $meta = new HtmlTag('meta');
        $meta->noClosing()->attr("name", $name)->attr("content", $value);
        return $meta;
    }


    /**
     * Div
     * @param string $content
     * @param string $cls
     * @param string $id
     */
    public function Div($content = '', $cls = '', $id = '')
    {
        return new HtmlTag('div', $content, $cls, $id);
    }


    /**
     * Nav
     * @param string $content
     * @param string $cls
     * @param string $id
     */
    public function Nav($content = '', $cls = '', $id = '')
    {
        return new HtmlTag('nav', $content, $cls, $id);
    }


    /**
     * Span
     * @param string $content
     * @param string $cls
     * @param string $id
     */
    public function Span($content = '', $cls = '', $id = '')
    {
        $span = new HtmlTag('span', $content, $cls, $id);
        return $span;
    }


    /**
     * AImg
     * @param string $src
     * @param string $url
     * @param string $cls
     * @param string $id
     * @param string $alt
     */
    function AImg($src, $url, $cls = '', $id = '', $alt = '')
    {
        $a = new HtmlTag('a', $this->Img($src, $alt));
        $a->attr("href", $url);
        $a->cls($cls);
        $a->id($id);
        return $a;
    }


    /**
     * Anchor
     * @param string $text
     * @param string $url
     * @param string $cls
     * @param string $id
     */
    public function A($text, $url, $cls = '', $id = '')
    {
        $a = new HtmlTag('a', $text);
        $a->attr("href", $url);
        $a->cls($cls);
        $a->id($id);
        return $a;
    }


    /**
     * I
     * @param string $cls
     * @param string $content
     */
    public function I($cls, $content = '')
    {
        return new HtmlTag('i', $content, $cls);
    }


    /**
     * Img
     * @param string $src
     * @param string $alt
     */
    public function Img($src, $alt = '')
    {
        $a = new HtmlTag('img');
        $a->attr("src", $src)->attr('alt', $alt);
        return $a;
    }


    /**
     * Svg Icon
     * @param string $content
     */
    public function Svg($content = '')
    {
        $svg = new HtmlTag('svg');
        $svg->attr("xmlns", "http://www.w3.org/2000/svg");
        $svg->attr("xmlns:xlink", "http://www.w3.org/1999/xlink");
        $svg->attr("width", "24px");
        $svg->attr("height", "24px");
        $svg->attr("viewBox", "0 0 24 24");
        $svg->attr("version", "1.1.");
        $svg->content($content);
        return $svg;
    }


    /**
     * g
     * @param  string $content [description]
     * @return object          [description]
     */
    public function g($content = '')
    {
        $g = new HtmlTag('g');
        $g->attr('stroke', 'none');
        $g->attr('stroke-width', '1');
        $g->attr('fill', 'none');
        $g->attr('fill-rule', 'evenodd');
        $g->content($content);
        return $g;
    }


    /**
     * Item Li
     * @param string $text
     * @param string $cls
     * @param string $id
     */
    public function Li($text, $cls = '', $id = '')
    {
        return new HtmlTag('li', $text, $cls, $id);
    }


    /**
     * UL / OL
     * @param string $cls
     * @param string $id
     */
    public function Ls($cls = '', $id = '')
    {
        return new Ls($cls, $id);
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
    public function H3($text, $cls = '', $id = '')
    {
        return new HtmlTag('h3', $text, $cls, $id);
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
        $input->noClosing()->attr("name", $name)->attr("value", $value);
        return $input;
    }


    public function TextArea($name = '', $value = '')
    {
        $textarea = new HtmlTag('textarea');
        $textarea->attr('name', $name)->attr('value', $value);
        return $textarea;
    }


    /**
     * [Button description]
     * @param string $type    [description]
     * @param string $caption [description]
     */
    public function Button($caption = '', $cls = '', $id = '')
    {
        $button = new HtmlTag('button');
        $button->cls($cls);
        $button->id($id);
        $button->content($caption);
        return $button;
    }


    /**
     * [Submit description]
     * @param [type] $caption [description]
     */
    public function Submit($caption)
    {
        $button = $this->Button($caption);
        $button->attr("type", "submit");
        return $button;
    }


    /**
     * Label
     */
    public function Label($lbfor = '', $caption)
    {
        $label = new HtmlTag('label');
        $label->attr('for', $lbfor)->content($caption);
        return $label;
    }


    /**
     * [Select description]
     * @param [type] $name [description]
     */
    public function Select($name)
    {
        return new Select($name);
    }


    /**
     * [Option description]
     * @param [type] $value   [description]
     * @param [type] $caption [description]
     */
    public function Option($value, $caption)
    {
        $option = new HtmlTag('option');
        $option->attr("value", $value)->content($caption);
        return $option;
    }


}
