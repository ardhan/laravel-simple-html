<?php
namespace Ardhan\LaravelSimpleHtml;

class Meta extends HtmlTag
{
    /**
     * [__construct description]
     */
    public function __construct()
    {
        parent::__construct('meta');
        $this->setNoClosing();
    }


    /**
     * [init description]
     * @param  string $content [description]
     * @return [type]          [description]
     */
    public static function init($content = '')
    {
        $obj = new self;
        $obj->name('meta')->noclosing();
        return $obj;
    }
}
