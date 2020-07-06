<?php
namespace HTML;

class Span extends HtmlTag
{
    /**
     * [__construct description]
     * @param [type] $content [description]
     */
    public function __construct($content)
    {
        parent::__construct('span', '', '', $content);
    }


    /**
     * Object akan dibuat jika object belum ada
     * @return [type] [description]
     */
    public static function init($content = '')
    {
        $obj = new Span($content);
        return $obj;
    }
}
