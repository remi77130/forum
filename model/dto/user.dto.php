<?php

class UserDto
{
    public $id;
    public $login;
    public $ville_id;
    public $mail;
    public $avatar;
    public $age;
    public $sexe;
    public $department;
    public $desire;
    public $desire_datetime;

    public function __construct($id, $login, $ville_id, $mail, $avatar, $age, $sexe, $department, $desire, $desire_datetime)
    {
        $this->id = $id;
        $this->login = $login;
        $this->ville_id = $ville_id;
        $this->mail = $mail;
        $this->avatar = $avatar;
        $this->avatar = $avatar;
        $this->age = $age;
        $this->sexe = $sexe;
        $this->department = $department;
        $this->desire = $desire;
        $this->desire_datetime = $desire_datetime;
    }

    public function getId()
    {
        return $this->id;
    }

    public function getLogin()
    {
        return $this->login;
    }

    public function getVilleId()
    {
        return $this->ville_id;
    }

    public function getMail()
    {
        return $this->mail;
    }

    public function getAvatar()
    {
        return $this->avatar;
    }

    public function setAvatar($avatar)
    {
        $this->avatar = $avatar;
    }

    public function getAge()
    {
        return $this->age;
    }

    public function getSexe()
    {
        return $this->sexe;
    }

    public function getDepartment()
    {
        return $this->department;
    }

    public function getDesire()
    {
        return $this->desire;
    }

    public function getDesireDateTime()
    {
        return $this->desire_datetime;
    }
}
