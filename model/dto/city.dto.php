<?php

class CityDto
{
    public $id;
    public $postal_code;
    public $name;

    public function __construct($id, $postal_code, $name)
    {
        $this->id = $id;
        $this->postal_code = $postal_code;
        $this->name = $name;
    }

    public function getId(){
        return $this->id;
    }

    public function getPostalCode()
    {
        return $this->postal_code;
    }

    public function getName()
    {
        return $this->name;
    }
}
