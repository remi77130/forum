<?php

class CityDto
{
    public $postal_code;
    public $name;

    public function __construct($postal_code, $name)
    {
        $this->postal_code = $postal_code;
        $this->name = $name;
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
