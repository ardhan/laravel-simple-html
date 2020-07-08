<?php
namespace Ardhan\LaravelSimpleHtml;

class HtmlTag
{
    /**
     * nama dari html tag contoh div
     * @var string
     */
    protected $tag = '';


    /**
     * id dari suatu komponen
     * contoh <div id="div_id"></div>
     * @var string
     */
    protected $id = '';


    /**
     * kelas dari suatu komponen
     * contoh <div class='row span10'></div>
     * cara menyimpan: $cls["row"] = "row";
     * @var array
     */
    protected $cls = [];


    /**
     * style/css inline pada komponen
     * contoh <div style='background-color:red'></div>
     * cara menyimpan: $style["background-color"] = "red";
     * @var array
     */
    protected $style = [];


    /**
     * atribut khusus pada komponen
     * contoh: <meta name="author" content="ini adalah author">
     * cara menyimpan: $attr["name"] = "name";
     * @var array
     */
    protected $attr = [];


    /**
     * atribut pada komponen
     * contoh: <option selected>
     * cara menyimpan: $single_attr["selected"] = "selected"
     * @var array
     */
    protected $single_attr = [];


    /**
     * content dari tag
     * contoh: <div>ini content</div>
     * cara menyimpan: $content[] = $content
     * @var array
     */
    protected $content = [];


    /**
     * boolean yang menyatakan apakah tag menggunakan tutup atau tidak
     * contoh menggunakan tutup <div></div>
     * contoh tanpa tutup <meta> <input>
     * @var [type]
     */
    protected $closing = true;


    /**
     * fungsi untuk mengkonstruksi kelas, urutan variable bedasarkan prioritas
     * @param string $tag     prioritas karena setiap tag harus memiliki nama
     * @param string $content dijadikan prioritas agar setiap membuat kelas mudah memasukkan konten
     * @param string $cls     kelas berada di atas id karena kelas lebih sering digunakan
     * @param string $id
     */
    public function __construct($tag, $content = '', $cls = '', $id = '')
    {
        $this->tag = $tag;
        if($content != '') $this->content($content);
        if($cls != '') $this->cls($cls);
        if($this->id != '') $this->id($id);
        return $this;
    }


    /**
     * set variable $tag
     * @param  string $tag nama tag
     * @return object
     */
    public function tag($tag)
    {
        $this->tag = $tag;
        return $this;
    }


    /**
     * set variable $closing menjadi false
     * @return object
     */
    public function noClosing()
    {
        $this->closing = false;
        return $this;
    }


    /**
     * set variable $closing menjadi true
     * @return object
     */
    public function useClosing()
    {
        $this->closing = true;
        return $this;
    }


    /**
     * menambahkan anggota variable $attr
     * @param  string $name  nama atribut
     * @param  string $value nilai atribut
     * @return object
     */
    public function attr($name, $value)
    {
        $this->attr[$name] = $value;
        return $this;
    }


    /**
     * resolve atribut $attr menjadi string
     * @return string
     */
    function getAttr()
    {
        $attr = '';
        foreach($this->attr as $key => $value){
            $attr .= $key.'="'.$value.'" ';
        }
        return trim($attr);
    }


    /**
     * set variable $id
     * @param  string $id nama id
     * @return object
     */
    public function id($id)
    {
        $this->id = $id;
        $this->attr("id", $this->id);
        return $this;
    }


    /**
     * set variable $cls
     * @param  [type] $cls [description]
     * @return [type]      [description]
     */
    public function cls($cls)
    {
        $this->cls[$cls] = $cls;
        return $this;
    }


    /**
     * unset item pada variable $cls
     * @param  string $cls array key yang akan dihapus
     * @return object
     */
    public function removeCls($cls)
    {
        unset($this->cls[$cls]);
        return $this;
    }


    /**
     * resolve variable cls menjadi attribut class html
     * @return void
     */
    public function clsResolve()
    {
        if(count($this->cls) > 0){
            $cls = '';
            foreach($this->cls as $key => $value){
                $cls .= $value . ' ';
            }

            $this->attr("class", trim($cls));
        }
    }


    /**
     * menambahkan anggota variable $content
     * @param  string $content konten yang dimasukkan
     * @return
     */
    public function content($content)
    {
        $this->content[] = $content;
        return $this;
    }


    /**
     * resolve variable $content menjadi string
     * @return string
     */
    public function getContent()
    {
        $content = '';
        foreach($this->content as $c){
            $content .= $c;
        }
        return $content;
    }


    /**
     * menambahkan anggota ke variable $style
     * @param  string $name  nama style
     * @param  string $value nilai style
     * @return object
     */
    public function style($name, $value)
    {
        $this->style[$name] = $value;
        return $this;
    }


    /**
     * resolve style menjadi atribut html
     * @return void
     */
    public function styleResolve()
    {
        if(count($this->style) > 0){
            $style = '';
            foreach($this->style as $key => $value){
                $style .= $key.":".$value.";";
            }
            $this->attr("style", $style);
        }
    }


    /**
     * menambahkan style width
     * @param  [type] $size [description]
     * @return [type]       [description]
     */
    public function width($size)
    {
        $this->style("width", $size);
        return $this;
    }


    /**
     * menambahkan style background
     * @param  [type] $color [description]
     * @return [type]        [description]
     */
    public function background($color)
    {
        $this->style('background', $color);
        return $this;
    }


    /**
     * menambahkan style padding-left
     * @param  [type] $size [description]
     * @return [type]       [description]
     */
    public function padding_left($size)
    {
        $this->style('padding-left', $size);
        return $this;
    }


    /**
     * menambahkan style padding-top
     * @param  [type] $size [description]
     * @return [type]       [description]
     */
    public function padding_top($size)
    {
        $this->style('padding-top', $size);
        return $this;
    }


    /**
     * menambahkan style padding-right
     * @param  [type] $size [description]
     * @return [type]       [description]
     */
    public function padding_right($size)
    {
        $this->style('padding-right', $size);
        return $this;
    }


    /**
     * menambahkan style padding-bottom
     * @param  [type] $size [description]
     * @return [type]       [description]
     */
    public function padding_bottom($size)
    {
        $this->style('padding-bottom', $size);
        return $this;
    }


    /**
     * [padding description]
     * @param  string $left   [description]
     * @param  string $right  [description]
     * @param  string $top    [description]
     * @param  string $bottom [description]
     * @return [type]         [description]
     */
    public function padding($left = '', $right = '', $top = '', $bottom = '')
    {
        if(($right == '') && ($top == '') && ($bottom == '')){
            $right = $left;
            $top = $left;
            $bottom = $left;
        }

        if($left != '') $this->padding_left($left);
        if($right != '') $this->padding_right($right);
        if($top != '') $this->padding_top($top);
        if($bottom != '') $this->padding_bottom($bottom);

        return $this;
    }


    /**
     * [text_center description]
     * @return [type] [description]
     */
    public function text_center()
    {
        $this->style('text-align', 'center');
        return $this;
    }


    /**
     * [__toString description]
     * @return string [description]
     */
    public function __toString()
    {
        $this->styleResolve();
        $this->clsResolve();
        $t = '';
        $t .= '<'.$this->tag;
        $t .= (count($this->attr) > 0) ? ' '.trim($this->getAttr()) : '';
        $t .= '>';
        $t .= $this->getContent();
        $t .= ($this->closing == true) ? '</'.$this->tag.'>' : '';
        return $t;
    }
}
