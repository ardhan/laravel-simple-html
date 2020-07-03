<?php
namespace HTML;

/**
 * Kelas ini digunakan untuk membuat object berupa element html. Sebuah tag html teridiri
 * dari <nama_tag id class style attribute singleattribut>
 */
class HtmlTag
{
    protected $tag = '';
    protected $id = '';
    protected $cls = '';
    protected $style = [];
    protected $attr = [];
    protected $single_attr = '';
    protected $content = [];
    protected $closing = true;
    protected static $obj = null;

    public function __construct($tag, $id = '', $cls = '', $content = '')
    {
        $this->setName($tag);
    }

    public function setName($tag)
    {
        $this->tag = $tag;
    }

    public function setId($id)
    {
        $this->id = $id;
    }

    public function addClass($cls)
    {
        $this->cls .= $cls;
    }



    public function __toString()
    {
        $t = '';
        $t .= '<'.$this->tag;
        $t .= ($this->id != "") ? ' id="'.$this->id.'"' : '';
        $t .= ($this->cls != "") ? ' class="'.trim($this->cls).'"' : '';
        $t .= ($this->single_attr != "") ? ' '.$this->single_attr : '';
        $t .= (count($this->style) > 0) ? ' style="'.this->getStyle().'"' : '';
        $t .= (count($this->attr) > 0) ? ' '.trim(this->getAttr()) : '';
        $t .= '>';
        $t .= $this->content;
        $t .= ($this->closing == true) ? '</'.$this->tag.'>' : '';
        return $t;
    }

    /**
     * [name description]
     * @param  [type] $tag [description]
     * @return [type]      [description]
     */
    public static function name($tag)
    {
        if(self::$obj == null){
            self::$obj = new HtmlTag('');
        }

        self::$obj->setName($tag);
        return self::$obj;
    }


    /**
     * [id description]
     * @param  [type] $id [description]
     * @return [type]     [description]
     */
    public static function id($id)
    {
        if(self::$obj == null){
            self::$obj = new HtmlTag('');
        }

        self::$obj->setId($id);
        return self::$obj;
    }


    /**
     * [addClass description]
     * @param [type] $cls [description]
     */
    public static function addClass($cls)
    {
        self::$cls .= ' '.$cls;
        return new static;
    }


    /**
     * [addAttr description]
     * @param [type] $name  [description]
     * @param [type] $value [description]
     */
    public static function addAttr($name, $value)
    {
        self::$attr[$name] = $value;
        return new static;
    }


    /**
     * [addSingleAttr description]
     * @param [type] $attr [description]
     */
    public static function addSingleAttr($attr)
    {
        self::$single_attr = $attr;
    }


    /**
     * [addStyle description]
     * @param [type] $name  [description]
     * @param [type] $value [description]
     */
    public function addStyle($name, $value)
    {
        self::$style[$name] = $value;
        return new static;
    }


    /**
     * [addContent description]
     * @param [type] $content [description]
     */
    public static function addContent($content)
    {
        self::$content .= $content;
        return new static;
    }


    public static function noClosing()
    {
        self::$closing = false;
        return new static;
    }


    /**
     * [getStyle description]
     * @return [type] [description]
     */
    protected static function getStyle()
    {
        $style = '';
        foreach(self::$style as $k => $v){
            $style .= $k.':'.$v.';';
        }
        return $style;
    }


    /**
     * [getAttr description]
     * @return [type] [description]
     */
    protected static function getAttr()
    {
        $attr = '';
        foreach(self::$attr as $k => $v){
            $attr .= $k.'="'.$v.'" ';
        }
        return $attr;
    }


    /**
     * [get description]
     * @return [type] [description]
     */
    public static function get()
    {
        $t = self::$obj;
        self::$obj = null;
        return $t;
    }

}
