<?php
namespace HTML;

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
     * [addMeta description]
     * @param [type] $name    [description]
     * @param [type] $content [description]
     */
    public function addMeta($name, $content)
    {
        $this->$meta[] = Meta::addAttr("name", $name)->addAttr("content",$content)->get();
    }


    /**
     * [getMeta description]
     * @return [type] [description]
     */
    protected function getMeta()
    {
        $meta = '';
        foreach($this->meta as $m){
            $meta .= $m;
        }
        return $meta;
    }


    /**
     * [author description]
     * @param  [type] $author [description]
     * @return [type]         [description]
     */
    public function setAuthor($author)
    {
        $this->author = $author;
        $this->$meta[] = "sdf".Meta::addAttr("name", "author")->addAttr("content", $this->author)->get();
    }


    /**
     * [description description]
     * @param  [type] $description [description]
     * @return [type]              [description]
     */
    public function setDescription($description)
    {
        $this->description = $description;
        $this->$meta[] = Meta::addAttr("name", "description")->addAttr("description", $this->author)->get();
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

        return $h;
    }


    /**
     * static function
     */

    public static function build()
    {
        if(self::$obj == null){
            self::$obj = new Page();
        }
    }

    public function get()
    {
        $page = self::$obj->__toString();
        self::$obj = null;
        return $page;
    }

    public static function title($title)
    {
        self::build();
        self::$obj->setTitle($title);
        return self::$obj;
    }

    public static function author($author)
    {
        self::build();
        self::$obj->setAuthor($author);
        return self::$obj;
    }



}
