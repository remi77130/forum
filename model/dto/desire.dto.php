<?php

class DesireDto
{
    public $id;
    public $text;
    public $color;

    public function __construct($id, $text, $color=null)
    {
        $this->id = $id;
        $this->text = $text;
        $this->color = $color;
    }

    public function getId()
    {
        return $this->id;
    }

    public function getText()
    {
        return $this->text;
    }

    public function getColor()
    {
        return $this->color;
    }
}
