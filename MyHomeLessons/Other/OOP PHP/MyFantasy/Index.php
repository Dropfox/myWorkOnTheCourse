<?php

interface Bakeg
{
    public function glory();
}

class Bottom implements Bakeg
{
    public function glory()
    {
        return 'faf';
    }

    protected $width;
    protected $height;
    protected $color;
    protected $background;

    public function __construct(string $width, string $height, string $color, string $background)
    {
        $this->width = $width;
        $this->height = $height;
        $this->color = $color;
        $this->background = $background;
    }

    public function getBottom()
    {
        return '<div style="
background:' . $this->background . ';width:' . $this->width . ';color :' . $this->color . '; height: ' . $this->height .
            '">привет мир</div>';
    }

    public function setWidth($whidth)
    {
        $this->width = $whidth;
    }


}

$bottom1 = new Bottom('50', '60', 'red', 'black');
echo $bottom1->glory();


