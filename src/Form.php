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
     * [__toString description]
     * @return string [description]
     */
    public function __toString()
    {
        $this->attr('method', $this->method);
        $this->attr('action', $this->action);

        return parent::__toString();
    }

}
