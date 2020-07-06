<?php
namespace Ardhan\LaravelSimpleHtml;

class Page
{
    private $css= [];
    private $js = [];
    private $js_top = [];
    private $meta = [];
    private $title = '';
    private $description = '';
    private $author = '';
    private $content = [];
    private $lang = 'id';
    private $charset = 'utf-8';
    private static $obj = null;


    /**
     * [__construct description]
     * @param string $title       [description]
     * @param string $author      [description]
     * @param string $description [description]
     */
    public function __construct($title = '', $author = '', $description = '')
    {
        $this->setTitle = $title;
        $this->setAuthor = $author;
        $this->setDescription = $description;
    }


    /**
     * [meta description]
     * @param  [type] $name    [description]
     * @param  [type] $content [description]
     * @return [type]          [description]
     */
    public function meta($name, $content)
    {
        $this->meta[$name] = $content;
        return $this;
    }


    /**
     * [getMeta description]
     * @return [type] [description]
     */
    protected function getMeta()
    {
        $meta = '';
        foreach($this->meta as $k => $v){
            $meta .= new Meta($k, $v);
        }
        return $meta;
    }


    /**
     * [author description]
     * @param  [type] $author [description]
     * @return [type]         [description]
     */
    public function author($author)
    {
        $this->meta("author", $author);
        return $this;
    }


    /**
     * [description description]
     * @param  [type] $description [description]
     * @return [type]              [description]
     */
    public function description($description)
    {
        $this->meta("description", $description);
        return $this;
    }


    /**
     * [title description]
     * @param  [type] $title [description]
     * @return [type]        [description]
     */
    public function setTitle($title)
    {
        $this->title = $title;
    }


    public function title($title)
    {
        $this->setTitle($title);
        return $this;
    }


    /**
     * [addCSS description]
     * @param [type] $url [description]
     */
    public function addCSS($url)
    {
        $this->css[] = $url;
    }


    protected function getCSS()
    {
        $css = '';
        foreach($this->css as $c){
            $css = $c;
        }
        return $css;
    }


    /**
     * [addJS description]
     * @param [type] $url [description]
     */
    public function addJS($url)
    {
        $this->js[] = $url;
    }


    /**
     * [addContent description]
     * @param [type] $content [description]
     */
    public function addContent($content)
    {
        $this->content[] = $content;
    }


    public function content($content)
    {
        $this->addContent($content);
        return $this;
    }


    protected function getContent()
    {
        $content = '';
        foreach($this->content as $c){
            $content .= $c;
        }
        return $content;
    }


    /**
     * [get description]
     * @return [type] [description]
     */
    public function __toString()
    {
        $h  = '<!DOCTYPE HTML>';
        $h .= '<html>';
        $h .= '<head lang="'.$this->lang.'">';
        $h .= $this->getMeta();
        $h .= $this->getCSS();
        $h .= '<title>'.$this->title.'</title>';
        $h .= '</head>';
        $h .= '<body>';
        $h .= $this->getContent();
        $h .= '</body>';
        $h .= '</html>';

        self::$obj = null;

        return $h;
    }


    /**
     * static function
     */

    public static function init()
    {
        $obj = new self;
        return $obj;
    }




}
