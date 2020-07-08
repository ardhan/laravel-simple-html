<?php
namespace Ardhan\LaravelSimpleHtml;
use Ardhan\LaravelSimpleHtml\Facades\Element as El;

class List extends HtmlTag
{
    /**
     * type dari list, apakah ul atau ol
     * @var [type]
     */
    private $type = "u";


    /**
     * menyimpan konten dari
     * @var [type]
     */
    private $li = [];


    /**
     * [private description]
     * @var [type]
     */
    private $list;


    /**
     * konstruksi kelas
     * @param string $type [description]
     */
    public function __construct($type = "u")
    {
        if($type == "u"){
            $this->type_u();
        }
        elseif($type == "o"){
            $this->type_o();
        }

        parent::__construct($this->type.'l');
    }


    /**
     * [type_u description]
     * @return [type] [description]
     */
    public function type_u()
    {
        $this->type = "u";
        return $this;
    }


    /**
     * [type_o description]
     * @return [type] [description]
     */
    public function type_o()
    {
        $this->type = "o";
    }


    /**
     * [li description]
     * @param  [type] $text [description]
     * @return [type]       [description]
     */
    public function li($text)
    {
        $this->li[] = $text;
    }


    /**
     * [lia description]
     * @param  [type] $text [description]
     * @param  [type] $url  [description]
     * @return [type]       [description]
     */
    public function lia($text, $url)
    {
        $this->li[] = El::a($text, $url);
    }


    /**
     * [liResolve description]
     * @return [type] [description]
     */
    private function liResolve()
    {
        $li = '';
        if(count($this->li) > 0){
            foreach($this->li as $lis){
                $li .= El::li($lis);
            }
        }

        $this->content($li);
    }


    /**
     * [__toString description]
     * @return string [description]
     */
    public function __toString()
    {
        $this->liResolve();
        return parent::__toString();
    }
}
