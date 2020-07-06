<?php
namespace Ardhan\LaravelSimpleHtml;

class A extends HtmlTag
{
    /**
     * [private description]
     * @var [type]
     */
    private $url;


    /**
     * [__construct description]
     * @param [type] $content [description]
     */
    public function __construct($content = '')
    {
        parent::__construct('a', '', '', $content);
    }


    /**
     * [setUrl description]
     * @param [type] $url [description]
     */
    public function setUrl($url)
    {
        $this->url = $url;
    }


    /**
     * [url description]
     * @param  [type] $url [description]
     * @return [type]      [description]
     */
    public function url($url)
    {
        $this->setUrl($url);
        return $this;
    }


    /**
     * [__toString description]
     * @return string [description]
     */
    public function __toString()
    {
        $this->attr("href", $this->url);
        return parent::__toString();
    }


    /**
     * [init description]
     * @param  string $content [description]
     * @return [type]          [description]
     */
    public static function init($content = '')
    {
        $obj = new A($content);
        return $obj;
    }
}
