<?php
namespace HTML;

class Div extends HtmlTag
{
    /**
     * [__construct description]
     */
    public function __construct($content = '')
    {
        parent::__construct('div', '', '', $content);
    }


    /**
     * Object akan dibuat jika object belum ada
     * @return [type] [description]
     */
    public static function init($content = '')
    {
        $obj = new Div($content);
        return $obj;
    }
}
