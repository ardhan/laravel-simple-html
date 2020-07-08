<?php
namespace Ardhan\LaravelSimpleHtml;
use Ardhan\LaravelSimpleHtml\Facades\Element as El;

class Form extends HtmlTag
{
    protected $method;
    protected $action;

    public function __construct($action = "", $method = "POST")
    {
        parent::__construct('form');
        $this->action = $action;
        $this->method = $method;
    }

    public function post_method()
    {
        $this->method = "POST";
        return $this;
    }

    public function get_method()
    {
        $this->method = "GET";
        return $this;
    }

    public function __toString()
    {
        $this->attr('method', $this->method);
        $this->attr('action', $this->action);

        return parent::__toString();
    }

}
