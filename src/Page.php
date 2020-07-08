<?php
namespace Ardhan\LaravelSimpleHtml;
use Ardhan\LaravelSimpleHtml\Facades\Element as El;

class Page
{
    /**
     * url css include pada head html
     * @var Array
     */
    protected $css= [];


    /**
     * url javascript include pada body html
     * @var Array
     */
    protected $js_top = [];


    /**
     * url javascript include pada body html
     * @var Array
     */
    protected $js_bottom = [];


    /**
     * informasi meta pada head html
     * @var Array
     */
    protected $meta = [];


    /**
     * html title <title></title>
     * @var String
     */
    protected $title = '';


    /**
     * deskripsi html page, disimpan dengan meta
     * @var String
     */
    protected $description = '';


    /**
     * author dari page disimpan dengan meta
     * @var String
     */
    protected $author = '';


    /**
     * konten dari html yang, berada pada body
     * @var Array
     */
    protected $content = [];


    /**
     * default bahasa yang digunakan
     * @var String
     */
    protected $lang = 'id';


    /**
     * default charset
     * @var String
     */
    protected $charset = 'utf-8';


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
        $this->head = El::tag('head');
        $this->body = El::tag('body');
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
    protected function metaResolve()
    {
        if(count($this->meta) > 0){
            foreach($this->meta as $k => $v){
                $this->head->content(El::meta($k, $v));
            }
        }
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
     * [addContent description]
     * @param [type] $content [description]
     */
    public function content($content)
    {
        $this->content[] = $content;
        return $this;
    }


    /**
     * [contentResolve description]
     * @return [type] [description]
     */
    protected function contentResolve()
    {
        if(count($this->content) > 0){
            foreach($this->content as $c){
                $this->body->content($c);
            }
        }
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
     * menambahkan anggota js
     * @param [type] $url [description]
     */
    public function js($url, $position = "bottom")
    {
        if($position == "bottom"){
            $this->js_bottom[] = $url;
        }
        elseif($position == "top"){
            $this->js_top[] = $url;
        }

        return $this;
    }


    /**
     * [jsResolve description]
     * @return [type] [description]
     */
    public function jsResolve()
    {
        if(count($this->js_top) > 0){
            foreach($this->js_top as $jt){
                $js = new HtmlTag('script');
                $js->attr('src', $jt);
                $this->head->content($js);
            }
        }

        if(count($this->js_bottom) > 0){
            foreach($this->js_bottom as $jb){
                $js = new HtmlTag('script');
                $js->attr('src', $jb);
                $this->body->content($js);
            }
        }
    }


    /**
     * resolving object page
     * @return String
     */
    public function __toString()
    {
        //resolving
        $this->cssResolve();
        $this->metaResolve();
        $this->head->content(new HtmlTag('title', $this->title));
        $this->contentResolve();
        $this->jsResolve();

        $html = new HtmlTag('html');
        $html->content($this->head)->content($this->body);
        return '<!DOCTYPE HTML>'.$html;
    }
}
