<?php
namespace Ardhan\LaravelSimpleHtml;

class H1 extends HtmlTag
{
    /**
     * [__construct description]
     * @param [type] $content [description]
     */
    public function __construct($content = '')
    {
        parent::__construct('h1', '', '', $content);
    }


    /**
     * [init description]
     * @param  [type] $content [description]
     * @return [type]          [description]
     */
    public static function init($content = '')
    {
        $obj = new H1($content);
        return $obj;
    }
}
