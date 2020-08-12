<?php

namespace myproject\models\lols;

class Lol
{
    private $lol;

    public function __construct($lol)
    {
        $this->lol = $lol;
    }

    public function getLol()
    {
        return $this->lol;
    }

    public function setLol($lol)
    {
        $this->lol = $lol;
    }
}

class LolsAdmin extends Lol
{
    private $Admin;

    public function __construct($lol, $Admin)
    {
        parent::__construct($lol);
        $this->Admin = $Admin;
    }

    public function getAdmin()
    {
        return $this->Admin;
    }
}
