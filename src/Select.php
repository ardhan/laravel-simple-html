<?php
namespace Ardhan\LaravelSimpleHtml;
use Ardhan\LaravelSimpleHtml\Facades\Element as El;

class Select extends HtmlTag
{
    /**
     * [protected description]
     * @var [type]
     */
    protected $option;


    /**
     * [protected description]
     * @var [type]
     */
    protected $selected = '';


    /**
     * [__construct description]
     */
    public function __construct($name)
    {
        $this->tag("select");
        $this->attr("name", $name);
    }


    /**
     * [option description]
     * @param  [type] $value   [description]
     * @param  [type] $caption [description]
     * @return [type]          [description]
     */
    public function option($value, $caption)
    {
        $this->option[$value] = El::option($value, $caption);
        return $this;
    }


    public function selected()
    {
        $this->selected = array_key_last($this->option);
        return $this;
    }


    /**
     * [resolveOption description]
     * @return [type] [description]
     */
    public function resolveOption()
    {
        $option = '';
        foreach($this->option as $key => $op){
            if($key == $this->selected) $op->single_attr('selected');
            $option .= $op;
        }
        $this->content($option);
    }


    public function __toString()
    {
        $this->resolveOption();
        return parent::__toString();
    }
}
