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
     * [protected description]
     * @var [type]
     */
    protected $formAction;


    /**
     * konten dari form
     * @var array
     */
    protected $formContent;


    /**
     * [protected description]
     * @var [type]
     */
    protected $labelContent;


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
        return $this;
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


    public function label($caption)
    {
        $name = array_key_last($this->formContent);
        $this->labelContent[$name] = El::label($name, $caption);
        return $this;
    }

    public function customInput($name, $content)
    {
        $this->formContent[$name] = $content;
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


    public function select($select)
    {
        $this->formContent[$select->getAttr("name")] = $select;
        return $this;
    }


    /**
     * [textarea description]
     * @param  [type] $name  [description]
     * @param  [type] $value [description]
     * @return [type]        [description]
     */
    public function textarea($name, $value)
    {
        $this->formContent[$name] = El::textarea($name, $value);
        return $this;
    }


    /**
     * [submit description]
     * @param  [type] $caption [description]
     * @return [type]          [description]
     */
    public function submit($caption)
    {
        $this->formAction .= El::submit($caption);
        return $this;
    }


    /**
     * [resolveFormContent description]
     * @return [type] [description]
     */
    public function resolveFormContent()
    {
        foreach($this->formContent as $key => $value){
            $container = El::div('', 'container-form-content');

            if(isset($this->labelContent[$key]))
                $container->content(El::label($key, $this->labelContent[$key]));
            $container->content($value);

            $this->content($container);
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
        $this->content($this->formAction);

        return parent::__toString();
    }

}
