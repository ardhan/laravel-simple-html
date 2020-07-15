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


    /**
     * kontruksi kelas
     */
    public function __construct()
    {
        $this->tag('table');
    }

    public function colWidth($size)
    {
        $this->colWidth = $size;
        return $this;
    }

    public function padding($size)
    {
        $this->cellpadding = $size;
        return $this;
    }

    public function spacing($size)
    {
        $this->cellspacing = $size;
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
            $index = 0;
            foreach($row["col"] as $col){
                $td = (is_object($col)) ? $col : El::td($col);
                if(isset($this->colWidth[$index])) $td->style("width", $this->colWidth[$index]);
                $tr->content($td);
                $index++;
            }
            $this->content($tr);
        }
    }

    public function __toString()
    {
        //border
        if($this->border) $this->attr("border", "1");
        $this->attr("cellspacing", $this->cellspacing);
        $this->attr("padding", $this->cellpadding);

        $this->resolveRow();
        return parent::__toString();
    }
}
