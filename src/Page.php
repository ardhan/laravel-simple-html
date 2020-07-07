<?php
namespace Ardhan\LaravelSimpleHtml;

class Page
{
    /**
     * url css include pada head html
     * @var Array
     */
    private $css= [];


    /**
     * url javascript include pada body html
     * @var Array
     */
    private $js = [];


    /**
     * url javascript include pada head html
     * @var Array
     */
    private $js_top = [];


    /**
     * informasi meta pada head html
     * @var Array
     */
    private $meta = [];


    /**
     * html title <title></title>
     * @var String
     */
    private $title = '';


    /**
     * deskripsi html page, disimpan dengan meta
     * @var String
     */
    private $description = '';


    /**
     * author dari page disimpan dengan meta
     * @var String
     */
    private $author = '';


    /**
     * konten dari html yang, berada pada body
     * @var Array
     */
    private $content = [];


    /**
     * default bahasa yang digunakan
     * @var String
     */
    private $lang = 'id';


    /**
     * default charset
     * @var String
     */
    private $charset = 'utf-8';


    /**
     * htmltag untuk head
     * @var Object HtmlTag
     */
    protected $head;


    /**
     * htmltag untuk body
     * @var Object HtmlTag
     */
    protected $body;

    /**
     * Konstruksi kelas page
     * @param string $title       judul page
     * @param string $author      author page
     * @param string $description deskripsi page
     */
    public function __construct($title = '', $author = '', $description = '')
    {
        $this->title($title);
        $this->author($author);
        $this->description($description);
        $this->head = new HtmlTag('head');
        $this->body = new HtmlTag('body');
    }


    /**
     * menambahkan anggota pada variable $meta
     * @param  String $name    nama meta
     * @param  String $content content meta
     * @return Object
     */
    public function meta($name, $content)
    {
        $this->meta[$name] = $content;
        return $this;
    }


    /**
     * resolve variable $meta menjadi kelas meta
     * @return String
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
     * set variable $author
     * @param  String $author
     * @return Object
     */
    public function author($author)
    {
        $this->author = $author;
        $this->meta("author", $author);
        return $this;
    }


    /**
     * set variable description
     * @param  String $description
     * @return Object
     */
    public function description($description)
    {
        $this->meta("description", $description);
        return $this;
    }


    /**
     * set variable $title
     * @param  [type] $title [description]
     * @return [type]        [description]
     */
    public function title($title)
    {
        $this->$title = $title;
        return $this;
    }


    /**
     * menambahkan anggota css
     * @param String $url
     */
    public function css($url)
    {
        $this->css[] = $url;
        return $this;
    }


    /**
     * resolve $css menjadi html tag link
     * @return Void
     */
    protected function cssResolve()
    {
        if(count($this->css) > 0){

            foreach($this->css as $c){
                $css = new HtmlTag('link');
                $css->attr('rel', 'stylesheet');
                $css->attr('href', $c);
                $this->head->content($css);
            }
        }
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
        //resolve
        $this->cssResolve();

        $h  = '<!DOCTYPE HTML>';
        $h .= '<html>';
        $h .= $this->head;

        $h .= '<body>';
        $h .= $this->getContent();
        $h .= '</body>';
        $h .= '</html>';
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
