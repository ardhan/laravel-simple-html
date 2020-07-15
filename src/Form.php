<?php
namespace Ardhan\LaravelSimpleHtml;
use Ardhan\LaravelSimpleHtml\Facades\Element as El;

class Form extends HtmlTag
{
    /**
     * variable method dari form GET/POST
     * @var string
     */
    protected $method;


    /**
     * action/tujuan dari form
     * @var string url
     */
    protected $action;


    /**
     * konten dari form
     * @var array
     */
    protected $formContent;


    /**
     * konstruksi kelas
     * @param string $action [description]
     * @param string $method [description]
     */
    public function __construct($action = "", $method = "POST")
    {
        parent::__construct('form');
        $this->action = $action;
        $this->method = $method;
    }


    /**
     * mejadikan method menjadi post
     * @return object
     */
    public function post_method()
    {
        $this->method = "POST";
        return $this;
    }


    /**
     * menjadikan method menjadi get
     * @return object
     */
    public function get_method()
    {
        $this->method = "GET";
        return $this;
    }


    /**
     * [input description]
     * @param  [type] $type  [description]
     * @param  [type] $name  [description]
     * @param  [type] $value [description]
     * @return [type]        [description]
     */
    public function input($type, $name, $value)
    {
        $this->formContent[$name] = El::input($type, $name, $value);
        return $this;
    }


    public function resolveFormContent()
    {
        foreach($this->formContent as $fc){
            echo $fc;
            $this->content($fc);
        }
    }


    /**
     * [__toString description]
     * @return string [description]
     */
    public function __toString()
    {
        $this->attr('method', $this->method);
        $this->attr('action', $this->action);
        $this->resolveFormContent();

        return parent::__toString();
    }

}
