<?php
namespace LaravelSimpleHtml;

class HtmlTag
{
    /**
     * [protected description]
     * @var [type]
     */
    protected $tag = '';


    /**
     * [protected description]
     * @var [type]
     */
    protected $id = '';


    /**
     * [protected description]
     * @var [type]
     */
    protected $cls = '';


    /**
     * [protected description]
     * @var [type]
     */
    protected $style = [];


    /**
     * [protected description]
     * @var [type]
     */
    protected $attr = [];


    /**
     * [protected description]
     * @var [type]
     */
    protected $single_attr = '';


    /**
     * [protected description]
     * @var [type]
     */
    protected $content = [];


    /**
     * [protected description]
     * @var [type]
     */
    protected $closing = true;



    /**
     * [protected description]
     * @var [type]
     */
    protected static $obj = null;


    /**
     * [__construct description]
     * @param string $tag     [description]
     * @param string $id      [description]
     * @param string $cls     [description]
     * @param string $content [description]
     */
    public function __construct($tag='', $id = '', $cls = '', $content = '')
    {
        $this->tag = $tag;
        $this->id = $id;
        $this->cls = $cls;
        $this->content[] = $content;
    }


    /**
     * [noclosing description]
     * @return [type] [description]
     */
    public function noClosing()
    {
        $this->closing = false;
        return $this;
    }


    public function useClosing()
    {
        $this->closing = true;
        return $this;
    }


    /**
     * [setName description]
     * @param [type] $tag [description]
     */
    public function name($tag)
    {
        $this->tag = $tag;
        return $this;
    }


    /**
     * [id description]
     * @param  [type] $id [description]
     * @return [type]     [description]
     */
    public function id($id)
    {
        $this->id = $id;
        return $this;
    }


    /**
     * [cls description]
     * @param  [type] $cls [description]
     * @return [type]      [description]
     */
    public function cls($cls)
    {
        $this->cls[] = $cls;
        return $this;
    }


    /**
     * [attr description]
     * @param  [type] $name  [description]
     * @param  [type] $value [description]
     * @return [type]        [description]
     */
    public function attr($name, $value)
    {
        $this->attr[$name] = $value;
        return $this;
    }


    /**
     * [getAttr description]
     * @return [type] [description]
     */
    function getAttr()
    {
        $attr = '';
        foreach($this->attr as $key => $value){
            $attr .= $key.'="'.$value.'" ';
        }
        return trim($attr);
    }


    /**
     * [content description]
     * @param  [type] $content [description]
     * @return [type]          [description]
     */
    public function content($content)
    {
        $this->content[] = $content;
        return $this;
    }


    /**
     * [getContent description]
     * @return [type] [description]
     */
    public function getContent()
    {
        $content = '';
        foreach($this->content as $c){
            $content .= $c;
        }
        return $content;
    }


    /**
     * [style description]
     * @param  [type] $name  [description]
     * @param  [type] $value [description]
     * @return [type]        [description]
     */
    public function style($name, $value)
    {
        $this->style[$name] = $value;
        return $this;
    }


    /**
     * [width description]
     * @param  [type] $size [description]
     * @return [type]       [description]
     */
    public function width($size)
    {
        $this->style('width', $size);
        return $this;
    }


    /**
     * [background_color description]
     * @param  [type] $color [description]
     * @return [type]        [description]
     */
    public function background($color)
    {
        $this->style('background', $color);
        return $this;
    }


    /**
     * [padding_left description]
     * @param  [type] $size [description]
     * @return [type]       [description]
     */
    public function padding_left($size)
    {
        $this->style('padding-left', $size);
        return $this;
    }


    /**
     * [padding_top description]
     * @param  [type] $size [description]
     * @return [type]       [description]
     */
    public function padding_top($size)
    {
        $this->style('padding-top', $size);
        return $this;
    }


    /**
     * [padding_right description]
     * @param  [type] $size [description]
     * @return [type]       [description]
     */
    public function padding_right($size)
    {
        $this->style('padding-right', $size);
        return $this;
    }


    /**
     * [padding_bottom description]
     * @param  [type] $size [description]
     * @return [type]       [description]
     */
    public function padding_bottom($size)
    {
        $this->style('padding-bottom', $size);
        return $this;
    }


    /**
     * [padding description]
     * @param  string $left   [description]
     * @param  string $right  [description]
     * @param  string $top    [description]
     * @param  string $bottom [description]
     * @return [type]         [description]
     */
    public function padding($left = '', $right = '', $top = '', $bottom = '')
    {
        if(($right == '') && ($top == '') && ($bottom == '')){
            $right = $left;
            $top = $left;
            $bottom = $left;
        }

        if($left != '') $this->padding_left($left);
        if($right != '') $this->padding_right($right);
        if($top != '') $this->padding_top($top);
        if($bottom != '') $this->padding_bottom($bottom);

        return $this;
    }


    /**
     * [text_center description]
     * @return [type] [description]
     */
    public function text_center()
    {
        $this->style('text-align', 'center');
        return $this;
    }


    /**
     * [getStyle description]
     * @return [type] [description]
     */
    function getStyle()
    {
        $style = '';
        foreach($this->style as $key => $value){
            $style .= $key.':'.$value.';';
        }
        return $style;
    }


    /**
     * [__toString description]
     * @return string [description]
     */
    public function __toString()
    {
        $t = '';
        $t .= '<'.$this->tag;
        $t .= ($this->id != "") ? ' id="'.$this->id.'"' : '';
        $t .= ($this->cls != "") ? ' class="'.trim($this->cls).'"' : '';
        $t .= ($this->single_attr != "") ? ' '.$this->single_attr : '';
        $t .= (count($this->style) > 0) ? ' style="'.$this->getStyle().'"' : '';
        $t .= (count($this->attr) > 0) ? ' '.trim($this->getAttr()) : '';
        $t .= '>';
        $t .= $this->getContent();
        $t .= ($this->closing == true) ? '</'.$this->tag.'>' : '';
        return $t;
    }
}
