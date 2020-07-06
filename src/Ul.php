<?php
namespace HTML;

class Ul extends HtmlTag
{
    private $li = [];
    /**
     * [__construct description]
     * @param [type] $content [description]
     */
    public function __construct($content = '')
    {
        parent::__construct('ul', '', '', $content);
    }

    public function li($content)
    {
        $this->li[] = $content;
        return $this;
    }

    private function getLi()
    {
        $li = '';
        foreach($this->li as $l)
        {
            $li .= new Li($l);
        }
        return $li;
    }

    public function __toString()
    {
        $this->content($this->getLi());
        return parent::__toString();
    }


    /**
     * [init description]
     * @param  [type] $content [description]
     * @return [type]          [description]
     */
    public static function init($content = '')
    {
        $obj = new Ul($content);
        return $obj;
    }
}
