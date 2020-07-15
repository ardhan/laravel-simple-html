<?php
namespace Ardhan\LaravelSimpleHtml;
use Ardhan\LaravelSimpleHtml\Facades\Element as El;

class Table extends HtmlTag
{
    /**
     * [protected description]
     * @var array
     */
    protected $row = [];


    /**
     * [protected description]
     * @var string
     */
    protected $cellpadding = 0;


    /**
     * [protected description]
     * @var string
     */
    protected $cellspacing = 0;


    /**
     * [protected description]
     * @var boolean
     */
    protected $border = false;


    /**
     * [protected description]
     * @var array
     */
    protected $colWidth = [];


    /**
     * kontruksi kelas
     */
    public function __construct()
    {
        $this->tag('table');
    }


    /**
     * [width description]
     * @param  [type] $size [description]
     * @return [type]       [description]
     */
    public function colWidth($size)
    {
        $this->colWidth = $size;
        return $this;
    }


    /**
     * [padding description]
     * @param  [type] $size [description]
     * @return [type]       [description]
     */
    public function padding($size)
    {
        $this->cellpadding = $size;
        return $this;
    }


    /**
     * [spacing description]
     * @param  [type] $size [description]
     * @return [type]       [description]
     */
    public function spacing($size)
    {
        $this->cellspacing = $size;
        return $this;
    }


    /**
     * [useBorder description]
     * @return [type] [description]
     */
    public function useBorder(){
        $this->border = true;
        return $this;
    }


    /**
     * [row description]
     * @param  [type] $col [description]
     * @return [type]      [description]
     */
    public function row($col)
    {
        $this->row[] = ["col" => $col];
        return $this;
    }


    /**
     * [resolveRow description]
     * @return void [description]
     */
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


    /**
     * [__toString description]
     * @return string [description]
     */
    public function __toString()
    {
        //border
        if($this->border) $this->attr("border", "1");
        $this->attr("cellspacing", $this->cellspacing);
        $this->attr("cellpadding", $this->cellpadding);

        $this->resolveRow();
        return parent::__toString();
    }
}
