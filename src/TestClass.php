<?php
namespace HTML;

class TestClass
{
    private $t;

    public function __construct()
    {
        $this->t = 0;
    }

    public function add1()
    {
        $this->t += 1;
        return $this;
    }
    public function add2()
    {
        $this->t += 2;
        return $this;
    }
    public function add3()
    {
        $this->t += 3;
        return $this;
    }
}
