<?php
namespace Ardhan\LaravelSimpleHtml;
use Ardhan\LaravelSimpleHtml\Facades\Element as El;

class Table extends HtmlTag
{
    protected $row = [];
    protected $col = [];
    protected $cellpadding = 0;
    protected $cellspacing = 0;
    protected $colWidth = [];

    public function __construct()
    {
        $this->tag('table');
    }

    public function colWidth($index, $size)
    {
        $this->colWidth[$index] = $size;
    }

    public function row($col)
    {
        $this->row[] = ["col" => $col];
    }

    public function resolveRow()
    {
        foreach($this->row as $row){
            $tr = El::tr();
            foreach($row["col"] as $col){
                $tr->content(El::td($col));
            }
        }
    }

    public function __toString()
    {
        $this->resolveRow();
        return parent::__toString();
    }
}
