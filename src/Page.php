<?php
namespace Ardhan\LaravelSimpleHtml;
use Ardhan\LaravelSimpleHtml\Facades\Element as El;

class Page
{
    /**
     * url css include pada head html
     * @var array
     */
    protected $css= [];


    /**
     * url javascript include pada body html
     * @var array
     */
    protected $js_top = [];


    /**
     * url javascript include pada body html
     * @var array
     */
    protected $js_bottom = [];


    /**
     * informasi meta pada head html
     * @var array
     */
    protected $meta = [];


    /**
     * html title <title></title>
     * @var string
     */
    protected $title = '';


    /**
     * deskripsi html page, disimpan dengan meta
     * @var string
     */
    protected $description = '';


    /**
     * author dari page disimpan dengan meta
     * @var string
     */
    protected $author = '';


    /**
     * konten dari html yang, berada pada body
     * @var array
     */
    protected $content = [];


    /**
     * default bahasa yang digunakan
     * @var string
     */
    protected $lang = 'id';


    /**
     * default charset
     * @var string
     */
    protected $charset = 'utf-8';


    /**
     * htmltag untuk head
     * @var object HtmlTag
     */
    protected $head;


    /**
     * htmltag untuk body
     * @var object HtmlTag
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
     * @param  string $name    nama meta
     * @param  string $content content meta
     * @return object
     */
    public function meta($name, $content)
    {
        $this->meta[$name] = $content;
        return $this;
    }


    /**
     * resolve variable $meta menjadi kelas meta
     * @return string
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
     * @param  string $author
     * @return object
     */
    public function author($author)
    {
        $this->author = $author;
        $this->meta("author", $author);
        return $this;
    }


    /**
     * set variable description
     * @param  string $description
     * @return object
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
     * @param string $url
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
     * @return void
     */
    protected function cssResolve()
    {
        if(count($this->css) > 0){
            foreach($this->css as $c){
                $css = new HtmlTag('link');
                $css->attr('rel', 'stylesheet')->attr('href', asset($c))->noClosing();
                $this->head->content($css);
            }
        }
    }


    /**
     * [js description]
     * @param  string $url
     * @param  string $position
     * @return object
     */
    public function js($url, $position = "bottom")
    {
        if($position == "bottom"){
            $this->js_bottom[] = asset($url);
        }
        elseif($position == "top"){
            $this->js_top[] = asset($url);
        }

        return $this;
    }


    /**
     * [jsResolve description]
     * @return void
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
     * [background description]
     * @param  string
     * @return object
     */
    public function background($color)
    {
        $this->body->background($color);
        return $this;
    }


    /**
     * resolving object page
     * @return string
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
