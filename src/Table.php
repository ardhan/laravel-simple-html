<?php
namespace Ardhan\LaravelSimpleHtml;
use Ardhan\LaravelSimpleHtml\Facades\Element as El;

class Table extends HtmlTag
{
    protected $row = [];
    protected $col = [];
    protected $cellpadding = 0;
    protected $cellspacing = 0;
    protected $border = false;
    protected $colWidth = [];

    public function __construct()
    {
        $this->tag('table');
    }

    public function colWidth($index, $size)
    {
        $this->colWidth[$index] = $size;
        return $this;
    }

    public function useBorder(){
        $this->border = true;
        return $this;
    }

    public function row($col)
    {
        $this->row[] = ["col" => $col];
        return $this;
    }

    public function resolveRow()
    {
        foreach($this->row as $row){
            $tr = El::tr();
            foreach($row["col"] as $col){
                $tr->content(El::td($col));
            }
            $this->content($tr);
        }
    }

    public function __toString()
    {
        //border
        if($this->border) $this->attr("border", "1");


        $this->resolveRow();
        return parent::__toString();
    }
}
